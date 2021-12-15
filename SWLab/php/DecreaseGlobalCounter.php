<?php
$xml = simplexml_load_file('../xml/UserCounter.xml');
foreach($xml->children() as $children){
    foreach($children->children() as $child){
        $num = $child->p;

        $users = intval($num);
        $users = $users - 1;
        $users = strval($users);
    
        $child->addChild('p',$users);
    }
}

    echo $xml->asXML('../xml/UserCounter.xml');
?>