<?php
include_once "functions.php";

$allColoursUnique = array();
$allColoursJson = array();

foreach ($colourDB as $colourName => $colour)
{
	//Get all 8 combos without cutting out duplicates
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
}

?>
