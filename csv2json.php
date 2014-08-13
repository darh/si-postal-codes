<?php

$fp = fopen('postal-codes.csv', 'r');

fgetcsv($fp); // skip header;
$data = [];

while (!feof($fp)) {
	$row = fgetcsv($fp);

	if (!$row) {
		continue;
	}

	list($no, $label, $user) = array_map('trim', $row);
	settype($no, 'int');

	if (!$no || !$label) {
		continue;
	}

	$data[$no] = [$label, $user ?: null];
}


echo json_encode($data);