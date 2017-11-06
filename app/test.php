<?php
$newsXML = new SimpleXMLElement("<news></news>");
$newsXML->addAttribute('newsPagePrefix', 'value goes here');
$newsIntro = $newsXML->addChild('content');
$newsIntro->addAttribute('type', 'latest');
Header('Content-type: text/xml');
echo $newsXML->asXML();
?>