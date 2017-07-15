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
		if ($S[$i] == "{" || $S[$i] == "[" || $S[$i] == "(") {
			array_push($open, $S[$i]);
		} else {
			if (empty($open)) {
				return false;
			}

			if ($close[end($open)] == $S[$i]) {
				array_pop($open);
			} else {
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
);

foreach ($arrS as $key => $value) {
	$res = solution($value);
	echo $key . " => " . (int) $res . "\n";
}