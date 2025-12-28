<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet;

use \Facet\Ioc;

// Base class for the request bootstrapper.
abstract class BootstrapperBase {
	// The application configuration helper.
	private AppConfig $appConfig;
	
	// The entries in the facet node of the XML configuration.
	private array $facetConfigEntries;
	
	// The IoC container
	private IocContainer $iocContainer;
	
	// Entry point into the Facet request pipeline
	final public function run(): Response {
		$this->onRun();
		
		$this->onLoadConfiguration();
		$this->appConfig = new AppConfig();
		$this->appConfig->load();
		$this->appConfig->traverseToTLN("facet");
		$this->facetConfigEntries = $appConfig->getNodeChildren();
		
		$this->onPreInitialize();
		$this->iocContainer = new IocContainer();
		
		$this->onInitialize();
	}
	
	// Called when the run method is called
	protected function onRun(): void {
		
	}
	
	// Called while the application configuration is being loaded
	protected function onLoadConfiguration(): void {
		
	}
	
	// Called when the application is preparing to initialize instrumentation
	protected function onPreInitialize(): void {
		
	}
	
	// Called while the application is initializing instrumentation
	protected function onInitialize(): void {
		
	}
	
	// Called when the application has initialized instrumentation
	protected function onPostInitialize(): void {
		
	}
	
	// Called when the application is preparing to route the request
	protected function onPreRoute(): void {
		
	}
	
	// Called while the application is routing the request
	protected function onRoute(): void {
		
	}
	
	// Called when the application has routed the request
	protected function onPostRoute(): void {
		
	}
	
	// Called when the application is preparing to authenticate the requesting user
	protected function onPreAuthenticate(): void {
		
	}
	
	// Called while the application is authenticating the requesting user
	protected function onAuthenticate(): void {
		
	}
	
	// Called when the application has authenticated the requesting user
	protected function onPostAuthenticate(): void {
		
	}
	
	// Called when the application is preparing to authorize the requesting user
	protected function onPreAuthorize(): void {
		
	}
	
	// Called while the application is authorizing the requesting user
	protected function onAuthorize(): void {
		
	}
	
	// Called when the application has authorized the requesting user
	protected function onPostAuthorize(): void {
		
	}
}
?>