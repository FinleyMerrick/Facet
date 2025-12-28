<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet\Ioc;

// Represents an exception within the Ioc domain of the framework.
class IocException extends \Exception {
	public function __construct() {
		$this->message = "Ioc Exception";
	}
	
	public function __construct(string $message) {
		$this->message = $message;
	}
}
?>