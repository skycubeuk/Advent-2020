<?php

$in = explode("\n\n", file_get_contents("input.txt"));
$t = 0;


foreach ($in as $ink => &$inv) {
    trim($inv);
    $inv = explode("\n", $inv);
    foreach ($inv as $inv2k => &$inv2v) {
        $inv2v = str_split($inv2v);
    }
}

foreach ($in as $group) {
    $c = 0;
    $size = count($group);
    $c2 = array();
    foreach ($group as $person) {
        foreach ($person as $answer) {
            if (!array_key_exists($answer, $c2)) {
                $c2[$answer] = 1;
            } else {
                $c2[$answer]++;
            }
        }
    }
    foreach ($c2 as $c22) {
        if ($c22 == $size) {
            $c++;
        }
    }
    $t = $t + $c;
}

echo $t;