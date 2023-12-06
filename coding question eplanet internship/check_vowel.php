<!-- check vowel -->
<?php

use function PHPSTORM_META\type;

function count_vowel($value)
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $new_value = strtolower($value);

    $index = 0;
    $count = 0;

    for ($x = 0; $x < strlen($new_value); $x++) {
        if (in_array($new_value[$x], $vowels)) {
            $count++;
            if ($count === 1) {
                $index = $x;
                echo nl2br("vowel start at index: " . $index . "\n");
            }
        }
    }

    return $count;
}
echo "vowel count:" . count_vowel("Orange is orange");
?>

<br>
<br>

<!-- consecutive vowel -->
<?php

function consec_vowel($value)
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $new_value = strtolower($value);

    $index = 0;
    $count = 0;
    $max = 0;

    $array = str_split($new_value);

    foreach ($array as $ind => $str) {

        if (in_array($str, $vowels)) {
            $count++;
            if ($count > $max) {
                $max = $count;
                $index = $ind - $max + 1;
            }
        } else {
            $count = 0;
        }
    }
    echo nl2br("consecutive vowel start at index: " . $index . "\n");
    return $max;
}

$string = consec_vowel("aeiouaeio Queen aeiouaeiou");
echo "consecutive vowel count: $string";

?>
