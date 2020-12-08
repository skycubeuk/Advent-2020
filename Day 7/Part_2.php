<?php

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



function bc2($bag, $count, $data, &$s)
{
    $c2 = 0;
    foreach ($data[$bag] as $sk => $sv) {
        $c2 = $c2 + $sv * $count;
        if (array_key_exists($sk, $s)) {
            $s[$sk] = $s[$sk] + ($sv * $count);
        }else{
            $s[$sk] = $sv * $count;
        }
    }
    print $c2 . "\n";
    return $c2;

}


$data = formatbags($in);

$c = 0;

$s = array("shiny gold" => 1);

while (count($s) > 0) {

    foreach ($s as $bag => $no) {
        $c = $c + bc2($bag,$no,$data,$s);
        
    }
   
    array_shift($s);

}

echo $c;