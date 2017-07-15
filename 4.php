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
	0=>array(8,8,5,7,9,8,7,4,8)
);
foreach ($Harr as $key => $value) {
	$res = solution($value);
	echo $key . " => " . (int) $res . "\n";
}

###
###