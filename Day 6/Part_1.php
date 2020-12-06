<?php


$in = explode("\n\n",file_get_contents("input.txt"));


$c = 0;
foreach($in as $ink => &$inv) {
    trim($inv);
    $inv = str_replace("\n","",$inv);
    $inv = str_split($inv);
    $inv = array_unique($inv);
    $c = $c + count($inv);
}


//$c = 0;
// foreach($in as $ink => &$inv) {
//     $c = $c + count(array_unique(str_split(str_replace("\n","",trim($inv)))));
// }
echo $c;