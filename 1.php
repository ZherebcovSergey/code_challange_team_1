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
			$index = array_pop($open);
			if (!isset($close[$index]) || $close[$index] != $S[$i]) {
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
	"((((()))))",
	"(((((())))))",
	"((((()))))))",
);

foreach ($arrS as $key => $value) {
	$res = solution($value);
	echo $key . " => " . $value . " => " . (int) $res . "\n";
}