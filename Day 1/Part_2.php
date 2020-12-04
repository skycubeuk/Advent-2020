<?php


//Read in the set of numbers
$in = file("input.txt");


//Clean up the numbers to remove any spaces
foreach ($in as &$inx) {
    $inx = trim($inx);
}


//Loop over the numbers till you find the pair then stop
foreach ($in as $a) {
    foreach ($in as $b) {
        foreach($in as $c) {
            if ($a + $b + $c == 2020) {
                echo $a * $b *$c . "\n";
                die();
            }
        }
    }
}