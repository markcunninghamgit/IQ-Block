<?php
include_once "functions.php";
/*
	Generates and draws a known combination of shapes that is valid
	prints block each time we add a shape
	run in terminal for terminal colours
*/

$myBlock = blankBlock();
$uniqueColours = generateUniqueColours();

printBlock($myBlock);

foreach ($uniqueColours as $colourCycle1K => $colourCycle1V)
{
	echo "another cycle1 - $colourCycle1K\n";
	try {
		$block1=addShape($myBlock,$colourCycle1V['shape']);
	}catch (Exception $e)
	{
	//	//echo "bad block1 add, skipping\n";
		continue;
	}
	$keys1 = array($colourCycle1V['colour'] => 1);
	print_r($keys1);
	printBlock($block1);
	foreach ($uniqueColours as $colourCycle2K => $colourCycle2V)
	{
		if (isset($keys1[$colourCycle2V['colour']]))
		{
			//echo "caught already done on " . $colourCycle2V['colour'] . "\n";
			continue;
		}
		$keys2=$keys1;
		$keys2[$colourCycle2V['colour']] = 1;
		echo "another cycle2 " . $colourCycle2V['colour']. "\n";
		$block2 = $block1;
		try {
			$block2=addShape($block2,$colourCycle2V['shape']);
		}catch (Exception $e)
		{
			//echo "bad block2 add, skipping\n";
			continue;
		}
		printBlock($block2);
		die();
		continue;

		foreach ($uniqueColours as $colourCycle3K => $colourCycle3V)
		{
			if (isset($keys2[$colourCycle3V['colour']]))
			{
				//echo "caught already done on " . $colourCycle2V['colour'] . "\n";
				continue;
			}
			$keys3=$keys2;
			$keys3[$colourCycle3V['colour']] = 1;
			//echo "another cycle3\n";
			$block3 = $block2;
			try {
				$block3=addShape($block3,$colourCycle3V['shape']);
			}catch (Exception $e)
			{
				//echo "bad block3 add, skipping\n";
				continue;
			}
			
			//printBlock($block3);

			foreach ($uniqueColours as $colourCycle4K => $colourCycle4V)
			{
				if (isset($keys3[$colourCycle4V['colour']]))
				{
					//echo "caught already done on " . $colourCycle4V['colour'] . "\n";
					continue;
				}
				$keys4=$keys3;
				$keys4[$colourCycle4V['colour']] = 1;
				echo "another cycle4\n";
				$block4 = $block3;
				try {
					$block4=addShape($block4,$colourCycle4V['shape']);
				}catch (Exception $e)
				{
					//echo "bad block4 add, skipping\n";
					continue;
				}
				
				printBlock($block4);

				foreach ($uniqueColours as $colourCycle5K => $colourCycle5V)
				{
					if (isset($keys4[$colourCycle5V['colour']]))
					{
						//echo "caught already done on " . $colourCycle5V['colour'] . "\n";
						continue;
					}
					$keys5=$keys4;
					$keys5[$colourCycle5V['colour']] = 1;
					//echo "another cycle5\n";
					$block5 = $block4;
					try {
						$block5=addShape($block5,$colourCycle5V['shape']);
					}catch (Exception $e)
					{
						//echo "bad block5 add, skipping\n";
						continue;
					}
					
					//printBlock($block5);

					foreach ($uniqueColours as $colourCycle6K => $colourCycle6V)
					{
						if (isset($keys5[$colourCycle6V['colour']]))
						{
							//echo "caught already done on " . $colourCycle6V['colour'] . "\n";
							continue;
						}
						$keys6=$keys5;
						$keys6[$colourCycle6V['colour']] = 1;
						//echo "another cycle6\n";
						$block6 = $block5;
						try {
							$block6=addShape($block6,$colourCycle6V['shape']);
						}catch (Exception $e)
						{
							//echo "bad block6 add, skipping\n";
							continue;
						}
						
						//printBlock($block6);

						foreach ($uniqueColours as $colourCycle7K => $colourCycle7V)
						{
							if (isset($keys6[$colourCycle7V['colour']]))
							{
								//echo "caught already done on " . $colourCycle7V['colour'] . "\n";
								continue;
							}
							$keys7=$keys6;
							$keys7[$colourCycle7V['colour']] = 1;
							//echo "another cycle7\n";
							$block7 = $block6;
							try {
								$block7=addShape($block7,$colourCycle7V['shape']);
							}catch (Exception $e)
							{
								//echo "bad block7 add, skipping\n";
								continue;
							}
							
							//printBlock($block7);

							foreach ($uniqueColours as $colourCycle8K => $colourCycle8V)
							{
								if (isset($keys7[$colourCycle8V['colour']]))
								{
									//echo "caught already done on " . $colourCycle8V['colour'] . "\n";
									continue;
								}

								echo "another cycle8\n";
								$block8 = $block1;
								try {
									$block8=addShape($block8,$colourCycle8V['shape']);
								}catch (Exception $e)
								{
									//echo "bad block8 add, skipping\n";
									continue;
								}
								
								printBlock($block8);
							}//end block8
						}//end block7
					}//end block6
				}//end block5
			}//end block4
		}//end block3
	}// end block2
}//end block 1
die();

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



