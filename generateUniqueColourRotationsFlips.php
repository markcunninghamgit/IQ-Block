<?php
include_once "functions.php";

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
			echo "c-$colourName-r$i-f-n is a duplicate of $duplicateID\n";
			echo "first: " . $jsonColour . "\nSecond: " . $allColoursJson[$duplicateID] . "\n";
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
			echo "c-$colourName-r$i-f-n is a duplicate of $duplicateID\n";
		}

	}

}

echo "number of elements is " . count($allColoursUnique) . "\n";
foreach ($allColoursUnique as $key => $value)
{
	echo "key: $key\n";
	print_r($value);
}

?>
