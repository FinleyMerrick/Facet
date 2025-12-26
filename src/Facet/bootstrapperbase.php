<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet;

// Base class for the request bootstrapper.
abstract class BootstrapperBase {
	// The application configuration helper.
	private $appConfig;
	
	// The entries in the facet node of the XML configuration.
	private $facetConfigEntries;
	
	public function __construct() {
		$appConfig = new AppConfig();
	}
	
	// Entry point into the Facet request pipeline
	final public function run() {
		onRun();
		
		onLoadConfiguration();
		
		$appConfig->load();
		
		$appConfig->traverseToTLN("facet");
		
		$facetConfigEntries = $appConfig->getNodeChildren();
	}
	
	// Called when the run method is called
	protected function onRun() {
		
	}
	
	// Called while the application configuration is being loaded
	protected function onLoadConfiguration() {
		
	}
	
	// Called when the application is preparing to initialize instrumentation
	protected function onPreInitialize() {
		
	}
	
	// Called while the application is initializing instrumentation
	protected function onInitialize() {
		
	}
	
	// Called when the application has initialized instrumentation
	protected function onPostInitialize() {
		
	}
	
	// Called when the application is preparing to route the request
	protected function onPreRoute() {
		
	}
	
	// Called while the application is routing the request
	protected function onRoute() {
		
	}
	
	// Called when the application has routed the request
	protected function onPostRoute() {
		
	}
	
	// Called when the application is preparing to authenticate the requesting user
	protected function onPreAuthenticate() {
		
	}
	
	// Called while the application is authenticating the requesting user
	protected function onAuthenticate() {
		
	}
	
	// Called when the application has authenticated the requesting user
	protected function onPostAuthenticate() {
		
	}
	
	// Called when the application is preparing to authorize the requesting user
	protected function onPreAuthorize() {
		
	}
	
	// Called while the application is authorizing the requesting user
	protected function onAuthorize() {
		
	}
	
	// Called when the application has authorized the requesting user
	protected function onPostAuthorize() {
		
	}
}
?>