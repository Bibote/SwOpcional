<?php
$xml = simplexml_load_file('../xml/UserCounter.xml');
foreach($xml->children() as $children){
    $num = $children;

}
$users = intval($num);
$users = $users + 1;
$users = strval($users);
$users = $xml->addChild('uCounter');
$users->addChild($num);
echo $xml->asXML('../xml/UserCounter.xml');

?>