<?php

require_once('Friends.php');

$options = array("uri" => "http://localhost");

$server = new SoapServer(null, $options);

$server->setClass('Friends');

$server->handle();

?>
