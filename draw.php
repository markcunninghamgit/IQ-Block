<?php
	$testBlock = blankBlock();

	printBlock($testBlock);















function blankBlock()
{
	$block = array();
	for ($i=0; $i< 8; $i++)
	{
		$block[$i] = array();
		for ($j=0; $j< 8; $j++)
		{
			$block[$i][$j] = "_";
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
			echo $blockToPrint[$i][$j]. " ";
		}
		echo "\r\n";
	}
}

