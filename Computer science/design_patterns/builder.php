<?php

#same like factory design pattern
#not only hiding object creation, also have step by step object creation
#we can say it preparing object
#eg: supervisor=builder (organise things)
#dg: carpenter=factory, mason=fatory

class Carpenter{
	private $windowSize;
	function setWindowSize($size){ $this->windowSize = $size; }
	function giveWindow(){ return $this->windowSize. " window is ready"; }
}
class Mason{
	private $wallSize;
	function setWallSize($size){$this->wallSize = $size;}
	function giveBrickWall(){ return $this->wallSize. " wall is ready"; }
}
class Builder{
	function getHouse(){
		$woodObj = new Carpenter();
		$woodObj->setWindowSize('small');
		$house = $woodObj->giveWindow()."<br>";
		$masonObj = new Mason();
		$masonObj->setWallSize('large');
		$house .= $masonObj->giveBrickWall();
		echo $house."<br>"."House ready";
	}
}

$obj = new Builder();
$obj->getHouse();
