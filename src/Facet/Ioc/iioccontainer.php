<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet\Ioc;

// Defines an interface for IoC containers to implement.
interface IIocContainer {
	// Binds an abstract class to a concrete class.
	public function bind(string $abstract, mixed $concrete): void;
	
	// Binds a singleton.
	public function singleton(string $abstract, mixed $concrete): void;
	
	// Registers a new instance.
	public function instance(string $abstract, object $instance);
	
	// Checks for whether a given binding/instance has been registered.
	public function has(string $abstract): bool;
	
	// Instantiates an instance.
	public function make(string $abstract): object;
}
?>