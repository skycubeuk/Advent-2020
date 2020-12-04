<?php
$in    = file("input.txt");
$data  = array();
$count = 0;

foreach ($in as &$inx) {

    $inx = trim($inx);
    $inx = explode(" ", $inx);
    $ab = explode("-", $inx[0]);
    $out = array("a" => (int)$ab[0], "b" => (int)$ab[1], "chr" => $inx[1][0], "password" => $inx[2]);
    array_push($data, $out);

}

foreach ($data as $a) {
    $hits = 0;

    $indexa = $a['a'] - 1;
    $indexb = $a['b'] - 1;

    if ($a['password'][$indexa] == $a['chr']) {
        $hits = $hits + 1;
    } 
    if ($a['password'][$indexb] == $a['chr']) {
        $hits = $hits + 1;
    } 
    if ($hits == 1) {
        $count = $count + 1;
    }


}

echo  $count . "\n";