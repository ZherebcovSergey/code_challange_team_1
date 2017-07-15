<?php

function solution($S) {
	if (empty($S) || $S == "") {
		return 1;
	}

	$strlen = strlen($S);
	if ($strlen % 2 > 0) {
		return 0;
	}

	$open = 0;

	for ($i = 0; $i < $strlen; $i++) {
		if ($S[$i] == "(") {
			$open++;
		} else {
			$open--;
			if ($open < 0) {
				return 0;
			}

		}
	}
	if ($open == 0) {
		return 1;
	} else {
		return 0;
	}

}

$arrS = array(
	"",
	"(",
	"()",
	"()()",
	"()())",
	"(())()",
	")",
	"))()((",
	"())(()",
	"((((()))))",
	"(((((())))))",
	"((((()))))))",
);

foreach ($arrS as $key => $value) {
	$res = solution($value);
	echo $key . " => " . $value . " => " . (int) $res . "\n";
}

###
###