<?php

	//Default blank colour unused by anything. Left here for copy paste purposes to add shapes. 
	//4x4 was the most common but there are shapes with less and some with more
	$colour = array(
		array(0,0,0,0),
		array(0,0,0,0),
		array(0,0,0,0),
		array(0,0,0,0)
		);

$colourDB = array();

	$colourDB["blue"] = array(
		array(1,1,0),
		array(1,1,1),
		array(1,1,1)
		);



	$colourDB["yellow"] = array(
		array(2,2,0,0),
		array(2,2,0,0),
		array(2,2,2,2)
		);


	$colourDB["lightPurple"] = array(
		array(3,0,0,3),
		array(3,0,0,3),
		array(3,3,3,3)
		);



	$colourDB["darkPurple"] = array(
		array(0,4,4,0),
		array(0,4,4,0),
		array(4,4,4,4)
		);


//old
	$colourDB["lightGreen"] = array(
		array(5,5,0,0),
		array(5,5,0,0),
		array(0,0,5,5),
		array(0,0,5,5)
		);

	$colourDB["lightGreen"] = array(
		array(0,0,5,5),
		array(5,5,5,5),
		array(5,5,0,0)
		);


	$colourDB["darkGreen"] = array(
		array(0,6,0),
		array(0,6,0),
		array(6,6,6),
		array(6,6,6)
		);




	$colourDB["orange"] = array(
		array(7,7,7,7),
		array(7,7,7,7)
		);




	$colourDB["pink"] = array(
		array(0,0,8,8,8),
		array(8,8,8,8,8)
		);




//Use these colours for verifying rotate functions work
	$testColour1= array(
		array(1,2,3,4,5),
		array(6,7,8,9,10)
		);

	$testColour1R = array(
		array(6,1),
		array(7,2),
		array(8,3),
		array(9,4),
		array(10,5)
		);



	$testColour2 = array(
		array(1,2,3),
		array(4,5,6),
		array(7,8,9)
		);

	$testColour2R = array(
		array(7,4,1),
		array(8,5,2),
		array(9,6,3)
		);



