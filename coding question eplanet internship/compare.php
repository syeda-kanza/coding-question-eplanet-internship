<?php

function comp($value)
{
    $array = [5, 6, 2, 9, 3, 8, 1, 10, 4, 7];
    $n = count($array);
    $result = array();

    for ($x = 0; $x < $n; $x++) {
        for ($y = $x + 1; $y < $n; $y++) {
            for ($z = $y + 1; $z < $n; $z++) {
                if ($array[$x] + $array[$y] + $array[$z] == $value) {
                    array_push($result, [$array[$x], $array[$y], $array[$z]]);
                }
            }
        }
    }
    if (count($result) > 0) {
        foreach ($result as $results) {
            echo "target sum =" . $value . "\t";
            echo implode("+", $results) . "=" . $value;
            echo "<br>";
        }
    } else {
        echo "target sum =" . $value . "\t";
        echo "No 3 values sum up to " . $value;
    }
}
comp(20);
?>