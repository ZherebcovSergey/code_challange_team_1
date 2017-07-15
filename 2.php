<?php

function solution($A,$B) {
	$N = count($A);
	$topCount = 0;
	$stackCount = 0;
	$stack = array();
	if($N == 1) return 1;
	for ($i=0; $i < $N ; $i++) {
		if($B[$i] == 0) {
			if(empty($stack)) $topCount++;
			else {
				while (!empty($stack)) {
					$tmpStack = end($stack);
					if($A[$tmpStack]>$A[$i]) {
						$life = false;
						break;
					}
					else {
						$life = true;
						array_pop($stack);
						$stackCount--;
					}
				}
				if($life) $topCount++;
			}
		}
		else {
			$stack[] = $i;
			$stackCount++;
		}
	}
	return $topCount+$stackCount;
}

$Aarr = array(
0=>array(0=>4,1=>3,2=>2,3=>1,4=>5),
1=>array(0=>4,1=>3,2=>2,3=>1,4=>5),
2=>array(0=>5,1=>3,2=>2,3=>1,4=>4),
3=>array(0=>5,1=>7,2=>2,3=>6,4=>4),
);
$Barr = array(
0=>array(0=>0,1=>1,2=>0,3=>0,4=>0),
1=>array(0=>0,1=>0,2=>0,3=>1,4=>1),
2=>array(0=>1,1=>0,2=>0,3=>0,4=>0),
3=>array(0=>0,1=>1,2=>1,3=>0,4=>1),
);
foreach ($Aarr as $key => $A) {
	$res = solution($A,$Barr[$key]);
	echo $key.' - '.$res.PHP_EOL;
}