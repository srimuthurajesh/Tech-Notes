<?php
/*----------------------------------------
	single class represent entire subsytems
	facade is french word meaning frontpage
-----------------------------------------*/

interface HotelMenu{
	function foodMenu();
}

class VegMenu implements HotelMenu{
	function foodMenu(){
		echo "super sampar ";
		echo "mass masala ";
	}
}


class NonVegMenu implements HotelMenu{
	function foodMenu(){
		echo "infused chicken ";
		echo "thala kari ";
	}
}

class Facade{
	var $_OvegMenu;
	var $_OnonVegMenu;
	
	function __construct(){
		$this->_OvegMenu = new VegMenu();
		$this->_OnonVegMenu = new NonVegMenu();
	}
	function showVegMenu(){
		$this->_OvegMenu->foodMenu();
	}
	function showNonVegMenu(){
		$this->_OnonVegMenu->foodMenu();
	}
	function showBothMenu(){
		$this->_OvegMenu->foodMenu();
		$this->_OnonVegMenu->foodMenu();
	}
}

$facadeObj = new Facade();
$facadeObj->showVegMenu();
