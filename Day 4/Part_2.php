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
    $vald = 0;
    if (
        array_key_exists("byr", $record) &&
        array_key_exists("iyr", $record) &&
        array_key_exists("eyr", $record) &&
        array_key_exists("hgt", $record) &&
        array_key_exists("hcl", $record) &&
        array_key_exists("ecl", $record) &&
        array_key_exists("pid", $record)
    ) {

        //byr (Birth Year) - four digits; at least 1920 and at most 2002.
        if ($record['byr'] >= 1920 and $record['byr'] <= 2002) {
            $vald = $vald +  1;
        }

        //iyr (Issue Year) - four digits; at least 2010 and at most 2020.
        if ($record['iyr'] >= 2010 and $record['iyr'] <= 2020) {
            $vald += 1;
        }

        //eyr (Expiration Year) - four digits; at least 2020 and at most 2030.
        if ($record['eyr'] >= 2020 and $record['eyr'] <= 2030) {
            $vald += 1;
        }

        //hgt (Height) - a number followed by either cm or in:
        //If cm, the number must be at least 150 and at most 193.
        //If in, the number must be at least 59 and at most 76.
        if (substr($record['hgt'], -2) == "cm") {
            $h = (int)substr($record['hgt'], 0, -2);
            if ($h >= 150 && $h <= 193) {
                $vald += 1;
            }
        } elseif (substr($record['hgt'], -2) == "in") {
            $h = (int)substr($record['hgt'], 0, -2);
            if ($h >= 59 && $h <= 76) {
                $vald += 1;
            }
        }

        //hcl (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
        if (preg_match('/^#([a-f0-9]{6})$/', $record['hcl'])) {
            $vald += 1;
        }

        //ecl (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
        if (
            $record['ecl'] == "amb" or
            $record['ecl'] == "blu" or
            $record['ecl'] == "brn" or
            $record['ecl'] == "gry" or
            $record['ecl'] == "grn" or
            $record['ecl'] == "hzl" or
            $record['ecl'] == "oth"
        ) {
            $vald += 1;
        }

        //pid (Passport ID) - a nine-digit number, including leading zeroes.
        if (strlen($record['pid']) == 9) {
            $vald += 1;
        }

    }
    if ($vald == 7) {
        $count = $count +1;
    }
}

echo $count;
