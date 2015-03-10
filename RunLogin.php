<?php
include "Start/penguinsource.php";
$cp = new opencp ("Configs/config.xml");
$cp->init();

while(true){
	$cp->loopFunction();
}

?>
