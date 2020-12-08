<?php
$in = file("input.txt");

foreach ($in as &$code) {
    $code = explode(" ", trim($code));
    $code[1] = (int)$code[1];
    $code[2] = 0;
}


$x = 0;

$acc = 0;

while ($x < count($in)) {
    $in[$x][2]++;

    if ($in[$x][2] > 1) {
        print $acc . "\n";

        die();
    }

    switch ($in[$x][0]) {

        case "acc";
            $acc = $acc + $in[$x][1];
            $x++;
            break;
        case "jmp";
            $x = $x + $in[$x][1];
            break;
        case "nop";
            $x++;
            break;
    }
}
