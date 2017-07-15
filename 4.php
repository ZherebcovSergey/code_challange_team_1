<?php

function solution($H) {

	$stack = array();
	$total = 0;
	foreach ($H as $height) {
		if(empty($stack)) {
			array_push($stack, $height);
			$total++;
		}
		else{
			while (!empty($stack)) {
				$tmpHeight = end($stack);
				if ($tmpHeight < $height) {
					array_push($stack, $height);
					$total++;
					break;
				} elseif($tmpHeight > $height) {
					array_pop($stack);
				}
				else break;
			}
			if (empty($stack)) {
				array_push($stack, $height);
				$total++;
			}
		}
	}
	return $total;
}
$Harr = array(
	0=>array(8,8,5,7,9,8,7,4,8),#7
	1=>array(1,2,3,4,5,6,7,8,9),#9
	2=>array(9,8,7,6,5,4,3,2,1),#9
	3=>array(9,8,7,6,5,5,6,7,8),#8
	4=>array(5,7,9,8,9,8,9,8,7),#6
);
foreach ($Harr as $key => $value) {
	$res = solution($value);
	echo $key . " => " . (int) $res . "\n";
}

###
###