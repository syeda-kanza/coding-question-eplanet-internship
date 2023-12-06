<?php

function response($status, $message, $data)
{
    echo json_encode(["success" => $status, "msg" => $message, "data" => $data]);
    die;
}

$status = $_POST['action'];

if ($status == 'sent') {
    comp();
}

function comp()
{
    $array=[5,6,2,9,3,8,1,10,4,7];
    $n=count($array);
    $result=array();

    $value = $_POST["value"];

    if (empty($value)) {
        response(false, "enter a value", []);
    } else {
        for($x=0; $x < $n ; $x++){
            for($y = $x +1 ; $y < $n ; $y++){
                for($z = $y + 1 ; $z < $n ; $z++){
                    if ($array[$x]+$array[$y]+$array[$z]==$value){
                        array_push($result,[$array[$x],$array[$y],$array[$z]]);
                    }
                }
            }
        }
        if (count($result) > 0) {
            foreach ($result as $results) {
                echo implode("+", $results) . "=" . $value;
                echo "<br>";
            }
            response(true, "target sum = $value", []);
        } else {
            response(false, "target sum = $value  No 3 values sum up to $value", []);
        }
    }
}
?>
<!-- http://localhost/new/guess_the_word.php -->