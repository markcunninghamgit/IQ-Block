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

/*
	Searches for the (left most) then (top most) square. 
	Used for: shapes + blocks
	returns array of 2 values: i,j coordinates of shape array where square is
*/
function findLeftTopSquare($shape, $taken = true)
{
	$rowCount = count($shape);
	$columnCount = count($shape[0]);

	//Start searching down the columns then extend the row as we go
	for ($i=0; $i<$columnCount; $i++)
	{
		for ($j=0; $j < $rowCount; $j++)
		{
			//Find the first instance of findme (default 1)
			if ($taken == true and $shape[$j][$i] != 0)
			{
				return array($j,$i);
			}

			if ($taken == false and $shape[$j][$i] == 0)
			{
				return array($j,$i);
			}


		}
	}
	throw new Exception('when searching for the top most left sqaure occupied by a shape or block, we found none... have we got a blank shape? if not something went wrong');

}








function blankBlock()
{
	$block = array();
	for ($i=0; $i< 8; $i++)
	{
		$block[$i] = array();
		for ($j=0; $j< 8; $j++)
		{
			$block[$i][$j] = "0";
		}
	}
	return $block;
}

function printBlock($blockToPrint)
{
	for ($i=0; $i< 8; $i++)
	{
		for ($j=0; $j< 8; $j++)
		{
			switch ($blockToPrint[$i][$j])
			{
				case 0:
					echo "\033[0;37m";
					break;

				case 1:
					echo "\033[0;34m";
					break;

				case 2:
					echo "\033[1;33m";
					break;

				case 3:
					echo "\033[1;35m";
					break;

				case 4:
					echo "\033[0;35m";
					break;

				case 5:
					echo "\033[1;32m";
					break;

				case 6:
					echo "\033[0;32m";
					break;

				case 7:
					echo "\033[0;33m";
					break;

				case 8:
					echo "\033[1;31m";
					break;
			}
			
			echo $blockToPrint[$i][$j]. " ";
			echo "\033[00m";
		}
		echo "\r\n";
	}
	echo "\r\n";
}

