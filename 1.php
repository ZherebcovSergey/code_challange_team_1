<?php

function solution($S) {

	if (empty($S) || $S == "") {
		return true;
	}

	$brackets = str_split($S);
	$count = count($brackets);
	if ($count % 2 > 0) {
		return false;
	}

	$open = array();
	$close = array(
		"{" => "}",
		"[" => "]",
		"(" => ")",
	);
	for ($i = 0; $i < $count; $i++) {
		if ($brackets[$i] == "{" || $brackets[$i] == "[" || $brackets[$i] == "(") {
			array_push($open, $brackets[$i]);
		} else {
			if (empty($open)) {
				return false;
			}

			if ($close[end($open)] == $brackets[$i]) {
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