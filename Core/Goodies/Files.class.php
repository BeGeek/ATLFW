<?php

/**
 * Files is a class who interacts with files in the server
 * 
 * This class is created to interact with the server files 
 * as well as directories
 * 
 * @author Prieto Garcia Ivan Francisco(orishiku)
 * @version 1.0
 * @since 27-03-2014
 * @copyright GNU GENERAL PUBLIC LICENSE
 * 
 * This file is part of Atlantia Framework <ATLFW>.
 * 
 * ATFW is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by 
 * the Free Software Foundation, either version 3 of the License.
 *  
 * ATFW is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with ATLFW.  If not, see <http://www.gnu.org/licenses/gpl-3.0.txt>.
 * 
 */
class Files {
	private $root;
	private $handle;
	private $content;
	private $contentArray = array();
	

	/**
	 * 	This method initializes the class defining the working directory
	 * 
	 * @name __construct()
	 * @access public
	 * @param [$root] the working directory
	 * @since 1.0
	 * @example /Core/Examples/Files/*
	 */
	function __construct($root) {
		$this::setRoot($root);
	}
	
	/**
	 * 	This method reads the contents of the file and save it for future use
	 * 
	 * @name read()
	 * @access public
	 * @param [$fileName] the file to read
	 * @since 1.0
	 * @example /Core/Examples/Files/*
	 */
	public function read($fileName) {
		$this::open($this::getRoot().$fileName, "r");
		$this::setContent(fread($this::getFile(), 
						  filesize($this::getRoot().$fileName)));
		$this::close();
	}

	/**
	 * 	This method reads the contents of the file and save it for future use
	 * 
	 * @name create()
	 * @access public
	 * @param [$fileName] the file to create
	 * @since 1.0
	 * @example /Core/Examples/Files/*
	 */
	public function create($fileName) {
		$this::open($filename, "rw");
		$this::close();
	}
	
	/**
	 * 	This method open the file
	 * 
	 * @name close()
	 * @access private
	 * @since 1.0
	 * @example /Core/Examples/Files/*
	 */	
	private function open($value, $type = null) {
		$this::setHandle(fopen($value, $type));
	}
	
	/**
	 * 	This method close the file
	 * 
	 * @name close()
	 * @access private
	 * @since 1.0
	 * @example /Core/Examples/Files/*
	 */	
	private function close() {
		fclose($this::getFile());
	}
	
	// SET METHODS
	
	private function setRoot($value) {
		$this->root = $value;
	}
	
	private function setHandle($value) {
		$this->handle = $value;
	}
	
	private function setContent($value) {
		$this->content = $value;
	}
	
	private function setContent($value = array()) {
		array_push($this->contentArray,$value);
	}
	
	// GET METHODS
	
	private function getRoot() {
		return $this->root;
	}
	
	private function getHandle() {
		return $this->handle;
	}
	
	private function getContent() {
		return $this->content;
	}
	
}// END

?>