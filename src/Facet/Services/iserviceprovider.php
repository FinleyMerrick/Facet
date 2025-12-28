<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet\Services;

require_once(__DIR__ . "../Ioc/iioccontainer.php");

use \Facet\Ioc;

interface IServiceProvider {
	// Registers bindings
	public function register(IIocContainer $container): void;
	
	// Boot services
	public function boot(IIocContainer $container): void;
}
?>