<?php
/* Copyright (C) Facet 2025. All rights reserved. */

require_once("iocexception.php");

namespace Facet\Ioc;

// Thrown when the IoC container expects: a. string reference to the class or b. a callable object but recieves neither
class InvalidIocBindingException extends IocException {
	public function __construct(string $class) {
		$this->message = "{$class} is not a valid Ioc binding";
	}
}
?>