<?php


#JSON
header('Content-type: text/json');
echo json_encode(array("name"=>"rajesh"));




#XML 
$xml = new SimpleXMLElement("<student />");
$xml->addChild("name","rajesh");
$xml->addChild("age","23");
$dom = dom_import_simplexml($xml)->ownerDocument;
$dom->formatOutput = true;
echo $dom->saveXML();

		#xml result in page source
		<?xml version="1.0"?>
		<student>
		  <name>rajesh</name>
		  <age>23</age>
		</student>
