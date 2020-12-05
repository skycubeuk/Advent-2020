<?php

function get_id($sn, $rows)
{
    $sn = str_split($sn);
    foreach ($sn as $a) {
        $halved = array_chunk($rows, ceil(count($rows) / 2));
        switch ($a) {
            case "F":
            case "L":
                $rows = $halved[0];
                break;
            case "B":
            case "R":
                $rows = $halved[1];
                break;
        }
    }
    return $rows;
}


function get_row_col($id)
{
    $rows = array();
    $cols = array();
    $x = 0;
    $y = 0;
    while ($x < 128) {
        $rows[$x] = $x;
        $x++;
    }

    while ($y < 8) {
        $cols[$y] = $y;
        $y++;
    }
    $rowcode = substr($id, 0, 7);
    $colcode = substr($id, 7, 3);

    $row = get_id($rowcode, $rows);
    $col = get_id($colcode, $cols);
    return $row[0] * 8 + $col[0];
}



$in = file("input.txt");
$max = 0;

foreach ($in as &$in2) {
    $in2 = trim($in2);
    $rid = get_row_col($in2);
    if ($rid > $max) {
        $max = $rid;
    }

}

echo $max;