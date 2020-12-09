<?php

$in = file("input.txt");

$ans = 0;

foreach ($in as &$inv) {
    $inv = (int)trim($inv);
}

function get_preamble($data, $size)
{
    $p = array_slice($data, 0, $size);
    return $p;
}

function get_sums($data)
{
    $out = array();
    foreach ($data as $pk => $pv) {
        foreach ($data as $pk2 => $pv2) {
            if ($pk !== $pk2) {
                array_push($out, $pv + $pv2);
            }
        }
    }
    $out = array_unique($out);
    sort($out);
    return $out;
}


while (true) {

    $v = get_preamble($in,25);
    $v = get_sums($v);
    if (!in_array($in[25],$v)) {
        $ans = $in[25];
        break;
    }
    array_shift($in);
}


print $ans;