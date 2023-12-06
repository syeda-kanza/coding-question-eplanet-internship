
<!-- array sorting -->
<?php

function bubble_sort($array)
{
    echo "unsorted array: ";
    print_r($array);
    $count = count($array);
    echo "<br>";
    for ($x = 0; $x < $count; $x++) {
        for ($y = 0; $y < $count - 1; $y++) {
            if ($array[$x] < $array[$y]) {
                $temp = $array[$x];
                $array[$x] = $array[$y];
                $array[$y] = $temp;
            }
        }
    }
    echo "<br>";
    echo "sorted array: ";
    print_r($array);
}
$value = [8, 2, 5, 1, 6, 0, 14];
bubble_sort($value);

?>

<br>
<br>



