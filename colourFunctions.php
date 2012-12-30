<?php


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

?>
