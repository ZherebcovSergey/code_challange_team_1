<?php

function solution($A, $B) {
	$N = count($A);
	$topCount = 0;
	$stackCount = 0;
	$stack = array();
	if ($N == 1) {
		return 1;
	}

	for ($i = 0; $i < $N; $i++) {
		if ($B[$i] == 0) {
			if (empty($stack)) {
				$topCount++;
			} else {
				while (!empty($stack)) {
					$tmpStack = end($stack);
					if ($A[$tmpStack] > $A[$i]) {
						$life = false;
						break;
					} else {
						$life = true;
						array_pop($stack);
						$stackCount--;
					}
				}
				if ($life) {
					$topCount++;
				}

			}
		} else {
			$stack[] = $i;
			$stackCount++;
		}
	}
	return $topCount + $stackCount;
}

$Aarr = array(
	0 => array(4, 3, 2, 1, 5), ##task
	1 => array(4, 3, 2, 1, 5), ##все выжили
	2 => array(5, 3, 2, 1, 4), ##первый всех сел
	3 => array(1, 3, 2, 4, 5), ##последний всех сел
	4 => array(5, 7, 2, 6, 4),
	5 => array(5, 6, 7, 8, 9),
	6 => array(5, 6, 7, 8, 9),
);
$Barr = array(
	0 => array(0, 1, 0, 0, 0),
	1 => array(0, 0, 0, 1, 1),
	2 => array(1, 0, 0, 0, 0),
	3 => array(1, 1, 1, 1, 0),
	4 => array(0, 1, 1, 0, 1),
	5 => array(1, 1, 1, 1, 1),
	6 => array(0, 0, 0, 0, 0),
);
foreach ($Aarr as $key => $A) {
	$res = solution($A, $Barr[$key]);
	echo $key . ' - ' . $res . PHP_EOL;
}