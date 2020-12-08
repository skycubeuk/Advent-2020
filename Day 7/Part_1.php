<?php
# 55.25.68
$in = file("input.txt");

function formatbags($in)
{
    $bags = array();
    foreach ($in as &$rule) {
        $rule = explode(" ", str_replace(".", "", str_replace(",", "", trim($rule))));
        $bag = array_shift($rule) . " " . array_shift($rule);
        array_shift($rule);
        array_shift($rule);
        $bags[$bag] = array();
        while (count($rule) > 0) {
            if ($rule[0] == "no") {
                break;
            } else {
                $num = array_shift($rule);
                $type = array_shift($rule) . " " . array_shift($rule);
                array_shift($rule);
                $bags[$bag][$type] = $num;
            }
        }
    }
    return $bags;
}

function updatec($data, $bag, &$answer)
{
    foreach ($data as $dk => $dv) {
        if (array_key_exists($bag, $dv)) {
            array_push($answer, $dk);
        }
    }
}

$data = formatbags($in);
$ac = 0;
$answer = array();

foreach ($data as $dk => $dv) {
    if (array_key_exists("shiny gold", $dv)) {
        array_push($answer, $dk);
    }
}

while ($ac !== count($answer)) {
    $ac = count($answer);
    $answer = array_unique($answer);
    foreach ($answer as $bag) {
        updatec($data, $bag, $answer);
    }
}

$answer = array_unique($answer);
echo count($answer). "\n";