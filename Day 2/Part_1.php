
<?php
$in    = file("input.txt");
$data  = array();
$count = 0;

foreach ($in as &$inx) {

    $inx = trim($inx);
    $inx = explode(" ", $inx);
    $minmax = explode("-", $inx[0]);
    $out = array("min" => (int)$minmax[0], "max" => (int)$minmax[1], "chr" => $inx[1][0], "password" => $inx[2]);
    array_push($data, $out);

}

foreach ($data as $a) {

    $hits = 0;
    $chars = str_split($a['password']);
    foreach ($chars  as $c) {
        if ($c == $a['chr']) {
            $hits = $hits + 1;
        }
    }

    if ($hits >= $a['min'] && $hits <= $a['max']) {
        $count = $count + 1;
    }
}

echo  $count . "\n";