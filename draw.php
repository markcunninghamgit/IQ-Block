<?php
include_once "functions.php";

$myBlock = blankBlock();
printBlock($myBlock);


$colour = rotateColour($colourDB["lightPurple"],1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["orange"],1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);

$colour = rotateColour($colourDB["lightGreen"],0);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["darkPurple"],1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["darkGreen"],1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["pink"],0);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["blue"],1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($colourDB["yellow"],3);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);



