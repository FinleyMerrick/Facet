<?php
/* Copyright (C) Facet 2025. All rights reserved. */

// Thrown when a file required by the framework is not found
class FileNotFoundException extends \Exception {
	public function __construct($filePath = "") {
		$this->message = " was not found. Please verify its location and try again.";
		
		if ($filePath == "") {
			// Prepend the file path 
			$this->message = "The file at \"{$filePath}\"" + $this->message;
		}
		else {
			// Generic messgae
			$this->message = "The requested file" + $this->message;
		}
	}
}
?>