<?php
/* Copyright (C) Facet 2025. All rights reserved. */

require_once(__DIR__ . "/iocexception.php");
require_once(__DIR__ . "/invalidiocbindingexception.php");

namespace Facet\Ioc;

// IoC container for Facet application services.
class FacetContainer implements IIocContainer {
	private array $bindings = array();
	private array $instances = array();
	
	public function bind(string $abstract, mixed $concrete): void {
		$this->bindings[$abstract] = array(
			"concrete" => $concrete,
			"singleton" => false
		);
	}
	
	public function singleton(string $abstract, mixed $concrete): void {
		$this->bindings[$abstract] = array(
			"concrete" => $concrete,
			"singleton" => true
		);
	}
	
	public function instance(string $abstract, object $instance): void {
		$this->instances[$abstract] = $instance;
	}
	
	public function has(string $abstract): bool {
		if (isset($this->bindings[$abstract]) || isset($this->instances[$abstract])) {
			return true;
		}
		
		return false;
	}
	
	public function make(string $abstract): object {
		if (isset($this->instances[$abstract])) { // exists
			return $this->instances[$abstract];
		}
		
		if (!isset($this->bindings[$abstract])) { // not exists, build it
			return $this->build($abstract);
		}
		
		$binding = $this->bindings[$abstract];
		$object = $this->resolve($binding['concrete']);
		
		if ($binding['singleton']) {
			$this->instances[$abstract] = $object;
		}
		
		return $object;
	}
	
	protected function resolve(mixed $concrete): object
	{
		if (is_callable($concrete)) {
			return $concrete($this);
		}
		
		if (is_string($concrete)) {
			return $this->build($concrete);
		}
		
		throw new InvalidIocBinding($concrete);
	}
	
	protected function build(string $class): object
	{
		$reflection = new ReflectionClass($class);
		
		if (!$reflection->isInstantiable()) {
			throw new IocException("{$class} is not instantiable.");
		}
		
		$constructor = $reflection->getConstructor();
		
		if ($constructor == null) {
			return new $class;
		}
		
		$dependencies = array();
		
		foreach ($constructor->getParameters() as $param) {
			$type = $param->getType();
			
			if ($type == null) {
				throw new IocException("Could not resolve dependency {$param->getName()}");
			}
			
			$dependencies[] = $this->make($type->getName());
		}
		
		return $reflection->newInstanceArgs($dependencies);
	}
}
?>