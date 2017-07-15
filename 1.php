<?php

function solution($S) {
	if (empty($S) || $S == "") {
		return 1;
	}

	$strlen = strlen($S);
	if ($strlen % 2 > 0) {
		return 0;
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
				return 0;
			}

		}
	}
	if (empty($open)) {
		return 1;
	} else {
		return 0;
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