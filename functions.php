<?php

require_once "colours.php";

function rotateColour($colour,$timesToRotate=1)
{
	//Rotate multiple times as required
	for ($rotateTime = 0; $rotateTime < $timesToRotate; $rotateTime ++)
	{
		//Get counts of original colour rows/columns
		$rowCount = count($colour);
		$columnCount = count($colour[0]);
		$rotatedColour = array();

		//build new array
		for ($x =0; $x < $rowCount; $x ++)
		{
			for ($y = 0; $y < $columnCount; $y ++)
			{
				$rotatedColour[ $y ][$rowCount - $x - 1] = $colour[$x][$y];
			}
		}

		//sort array by index since we added them out of order. This is so foreach takes 0 first then 1,2,3 etc
		foreach ($rotatedColour as $key => $value)
		{
			ksort($rotatedColour[$key]);
		}
		ksort($rotatedColour);

		$colour = $rotatedColour;
	}

	return $colour;
}


/*
	regardless of simplicity, it's easier to understand a call to flipColour compared to array_reverse when used
*/
function flipColour($colour)
{
	return array_reverse($colour);
}

function printColour($colour)
{
	//echo "starting to draw colour\n";
	foreach ($colour as $row)
	{
		foreach ($row as $column)
		{
			echo $column . " ";
		}
		echo "\r\n";
	}
	echo "\r\n";

}


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
			if (($blockI > 7 or $blockI < 0) or ($blockJ > 7 or $blockJ <0))
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


/*
	Generate a blank block
*/
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


/*
	Print block for terminal with colours
	uses terminal colour codes
*/
function printBlockPlain($blockToPrint)
{
	for ($i=0; $i< 8; $i++)
	{
		for ($j=0; $j< 8; $j++)
		{
			echo $blockToPrint[$i][$j]. " ";
		}
		echo "\r\n";
	}
	echo "\r\n";
}


/*
	Print block for terminal with colours
	uses terminal colour codes
*/
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
	
				case 9:
					echo "\033[1;36m";
					break;
			
				case 10:
					echo "\033[1;37m";
					break;
			}
					
			echo "x" /*$blockToPrint[$i][$j]*/. " ";
			echo "\033[00m";
		}
		echo "\r\n";
	}
	echo "\r\n";
}

/*
	For all colours
	  Gen list all rotation/flip states
	remove duplicates (colour could be the same thing flipped or rotated)
	return massive list of all possabilities
*/
function generateUniqueColours()
{
	global $colourDB;
	$allColoursUnique = array();
	$allColoursJson = array();

	foreach ($colourDB as $colourName => $colour)
	{
		//Do this twice and flip shapes the second time

		//Get all rotations and cut out duplications
		for ($i=0; $i<4; $i++)
		{
			$jsonColour = json_encode(rotateColour($colour,$i));
			$duplicateID = array_search($jsonColour,$allColoursJson);
			if ($duplicateID === false)
			{
				$allColoursUnique["c-$colourName-r$i-f-n"] = array("colour" => $colourName, "shape" =>  rotateColour($colour,$i));
				$allColoursJson["c-$colourName-r$i-f-n"] = $jsonColour;
			}
			else
			{
				//echo "DEBUG: c-$colourName-r$i-f-n is a duplicate of $duplicateID\n";
				//echo "DEBUG: first: " . $jsonColour . "\nSecond: " . $allColoursJson[$duplicateID] . "\n";
			}
		}

		
		//Get all rotations with flipped colour
		$colour  = flipColour($colour);	
		for ($i=0; $i<4; $i++)
		{
			$jsonColour = json_encode(rotateColour($colour,$i));
			$duplicateID = array_search($jsonColour,$allColoursJson);
			if ($duplicateID === false)
			{
				$allColoursUnique["c-$colourName-r$i-f-y"] =  array("colour" => $colourName, "shape" => rotateColour($colour,$i));
				$allColoursJson["c-$colourName-r$i-f-y"] = $jsonColour;
			}
			else
			{
				//echo "DEBUG: c-$colourName-r$i-f-n is a duplicate of $duplicateID\n";
			}
		}
	}
	return $allColoursUnique;
}


