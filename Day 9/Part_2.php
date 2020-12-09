<?php

$in = file("input.txt");
$in2 = $in;
$ans = 0;
$pre = 25;
foreach ($in as &$inv) {
    $inv = (int)trim($inv);
}


$in2 = $in;

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

    $v = get_preamble($in, $pre);
    $v = get_sums($v);
    if (!in_array($in[$pre], $v)) {
        $ans = $in[$pre];
        break;
    }
    array_shift($in);
}




while (true) {
    $in3 = $in2;

    while (count($in3) > 0) {
        $acc = array_sum($in3);
        if ($acc == $ans) {
            sort($in3);
            $b = array_shift($in3) + array_pop($in3);
            echo $b;
            die();
        }
        array_pop($in3);
    }
    array_shift($in2);
    if (count($in2) == 0) {
        break;
    }
}
