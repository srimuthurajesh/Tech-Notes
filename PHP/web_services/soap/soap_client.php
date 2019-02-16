<?php
$options = array("location" => "http://localhost/soap/soap_service.php",
				"uri" => "http://localhost");
				
try{

$client = new SoapClient(null, $options);
$students = $client->getFriends();

echo $students;

}

catch(SoapFault $ex){
echo "<pre>";
var_dump($ex);
echo "</pre>";

}

?>
