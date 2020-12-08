<?php
$in = file("input.txt");

foreach ($in as &$code) {
    $code = explode(" ", trim($code));
    $code[1] = (int)$code[1];
    $code[2] = 0;
    if ($code[0] == "nop" or $code[0] == "jmp") {
        $code[3] = 0;
    } else {
        $code[3] = 2;
    }
}

function swap(&$code)
{
    foreach ($code as &$ins) {
        $ins[2] = 0;
        if ($ins[3] == 1) {
            if ($ins[0] == "nop") {
                $ins[0] = "jmp";
                $ins[3] = 2;
            } else {
                $ins[0] = "nop";
                $ins[3] = 2;
            }
        }
    }
    foreach ($code as &$ins) {
        if ($ins[3] == 0) {
            if ($ins[0] == "nop") {
                $ins[0] = "jmp";
                $ins[3] = 1;
                break;
            } else {
                $ins[0] = "nop";
                $ins[3] = 1;
                break;
            }
        }
    }
}

$x = 0;
$acc = 0;

while ($x < count($in)) {
    $in[$x][2]++;

    if ($in[$x][2] > 1) {
        swap($in);
        $x = 0;
        $acc = 0;
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





if ($x == count($in)) {
    print $acc . "\n";
    print "done";
}
