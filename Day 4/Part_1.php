<?php

$in = file_get_contents("input.txt");
$count = 0;
$in2 = explode("\n\n", $in);

foreach ($in2 as &$in3) {
    $out = array();
    $in3 = str_replace("\n", " ", $in3);
    $in3 = explode(" ", $in3);
    foreach ($in3 as $in4) {
        $aaa = explode(":", $in4);
        $out[$aaa[0]] = $aaa[1];
    }
    $in3 = $out;
}

foreach ($in2 as $record) {
    if (
        array_key_exists("byr", $record) &&
        array_key_exists("iyr", $record) &&
        array_key_exists("eyr", $record) &&
        array_key_exists("hgt", $record) &&
        array_key_exists("hcl", $record) &&
        array_key_exists("ecl", $record) &&
        array_key_exists("pid", $record)
    ) {
        


       $count = $count +1;
    }
}

echo $count;

?>