<?php
include_once "colours.php";
include_once "colourFunctions.php";
$myBlock = blankBlock();


printBlock($myBlock);


$colour = rotateColour($lightPurple,1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($orange,1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);

$colour = rotateColour($lightGreen,0);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($darkPurple,1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);

$colour = rotateColour($darkGreen,1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($pink,0);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);


$colour = rotateColour($blue,1);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);




$colour = rotateColour($yellow,3);
$myBlock = addShape($myBlock,$colour);
printBlock($myBlock);









/*
	add an already rotated and flipped shape to the block
*/
function addShape($block,$shape)
{
	/*
	get next free spot in block
	get left top cornor of shape

	*/
	$freeSlot = findLeftTopSquare($block,false);
	$startingShapePoint = findLeftTopSquare($shape);

	/*
		Loop through shape. 
			get shape square loc based on starting square
			if shape loc on block is free (based on freeslot to start from)
				place part of shape on block
			if not, return -1
	*/
	$rowCount = count($shape);
	$columnCount = count($shape[0]);

	//Loop around shape squares
	for ($i=0; $i<$rowCount; $i++)
	{
		for ($j=0; $j < $columnCount; $j++)
		{
			//shape square isn't taken, don't try place on block
			if ($shape[$i][$j] == 0)
			{
				continue;
			}

			//Purposly made I and J instead of x and y as [i][j] is more similar to j,i on a math graph
			$blockI = $freeSlot[0] - $startingShapePoint[0] + $i;
			$blockJ = $freeSlot[1] + $j;
			//Check if shape is trying to be placed outside of block bounds
			if (($blockI > 8 or $blockI < 0) or ($blockJ > 8 or $blockJ <0))
			{
				throw new Exception (" shape outside of block bounds, failied to add shape");
			}
			
			//Block pos is empty? Place the square
			if ($block[$blockI][$blockJ] == 0)
			{
				$block[$blockI][$blockJ] =$shape[$i][$j];
			}
			else
			{
				throw new Exception ("block spot is taken, cannot add shape here. there is an" . $block[$blockI][$blockJ]  . "here " 
				. "Loc, i:$i, j: $j");
			}
		}
	}
	
	return $block;
}




/*
	Searches for the (left most) then (top most) square. 
	Used for: shapes + blocks
	returns array of i,j elements of shape array where square is
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

