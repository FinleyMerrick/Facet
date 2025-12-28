<?php
/* Copyright (C) Facet 2025. All rights reserved. */

namespace Facet;

// Facilitates the reading of XML application configuration.
class AppConfig {
	// The path to the configuration file.
	private string $appConfigFilePath = $_SERVER["DOCUMENT_ROOT"] . "/app.config.xml";
	
	// The XML namespace of the configuration file.
	private string $xmlns = "http://facet.fiftiper.com/appConfig";
	
	// The XML reader.
	private XMLReader $reader;
	
	public function __construct() {
		$this->reader = new XMLReader();
	}
	
	public function __destruct() {
		$this->reader->close();
	}
	
	// Checks for the existence of the file, and prepares the reader for reading.
	public function load() {
		if (!file_exists($this->appConfigFilePath)) {
			throw new FileNotFoundException($appConfigFilePath);
		}
		
		$this->resetReaderCursor();
	}
	
	// Forces the XML reader to re-read the document, placing the cursor into its initial position.
	private function resetReaderCursor() {
		$this->reader->close();
		$this->reader->open($this->appConfigFilePath, "UTF-8", LIBXML_COMPACT & LIBXML_NOENT);
	}
	
	// Attempts to traverse to the topmost node with a name matching the provided name.
	// Returns: a boolean indicating whether the node was found.
	public function traverseToTLN($nodeName) {
		while ($this->reader->read()) {
			if ($reader->localName == $nodeName && $this->reader->namespaceURI == $this->xmlns) {
				return true;
			}
		}
		
		return false;
	}
	
	// Creates an array of all children of the currently selected node
	// Returns: the array
	public function getNodeChildren() {
		if ($this->reader->isEmptyElement) {
			// No children
			return array();
		}
		
		$children = array();
		$depth = $this->reader->depth;
		
		while ($this->reader->read()) {
			if ($this->reader->nodeType == XMLReader::ELEMENT && $reader->depth == $depth + 1) {
                $children[] = clone $reader; // clone reader to remember position
            }
			
            if ($reader->nodeType == XMLReader::END_ELEMENT && $reader->depth == $depth) { // aka we are exiting the node
                break;
            }
		}
		
		return $children;
	}
}
?>