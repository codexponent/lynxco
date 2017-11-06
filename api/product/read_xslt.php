<?php

// Load the XML source
$xml = new DOMDocument;
$xml->load('http://localhost/lynxco/api/product/read_xml.php');

$xsl = new DOMDocument;
$xsl->substituteEntities = true;
$xsl->load('read.xsl');

// Configure the transformer
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // attach the xsl rules

echo $proc->transformToXML($xml);

?>