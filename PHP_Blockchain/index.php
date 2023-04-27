<?php 
require "block.php"
require "chain.php"

$b = new Block ("Skola");
$ch = new Chain ();

$b = new Block();
$ch->addBlock($b);

var_dump($ch);