<?php

class HighVoltage{
	function getCurrent(){
		echo 230;
	}
}
class Adapter{
	private $_adaptObject;
	function __construct($obj){
		$this->_adaptObject = $obj;
	}
	function getCurrent(){
		echo $this->_adaptObject->getCurrent()-215;
	}
}


$obj = new HighVoltage();
$adaptObj = new Adapter($obj);
$adaptObj->getCurrent();
