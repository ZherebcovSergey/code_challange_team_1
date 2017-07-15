<?php

function solution($S) {
	if (empty($S) || $S == "") {
		return true;
	}

	$strlen = strlen($S);
	if ($strlen % 2 > 0) {
		return false;
	}

	$open = array();
	$close = array(
		"{" => "}",
		"[" => "]",
		"(" => ")",
	);
	for ($i = 0; $i < $strlen; $i++) {
		if (isset($close[$S[$i]])) {
			array_push($open, $S[$i]);
		} else {
			if ($close[array_pop($open)] != $S[$i]) {
				return false;
			}

		}
	}
	if (empty($open)) {
		return true;
	} else {
		return false;
	}

}

$arrS = array(
	"",
	"{}",
	"()",
	"[]",
	"{[()()]}",
	"([)()]",
	"((){])[]",
	"[",
	"]",
);

foreach ($arrS as $key => $value) {
	$res = solution($value);
	echo $key . " => " . (int) $res . "\n";
}