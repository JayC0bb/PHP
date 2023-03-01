<?php
$number1 = filter_input(INPUT_GET, 'n1', FILTER_VALIDATE_FLOAT);
$number2 = filter_input(INPUT_GET, 'n2', FILTER_VALIDATE_FLOAT);
$operator = filter_input(INPUT_GET, 'operator');
$sum = 0;
$result = [
    "result" => 0, 
];
if (is_numeric($number1) && is_numeric($number2)) {
    switch ($operator) {
        case "add":
           $sum = $number1 + $number2;
           $result = ["result" => $sum];
            break;
        case "subtract":
           $sum = $number1 - $number2;
           $result = ["result" => $sum];
            break;
        case "multiply":
            $sum = $number1 * $number2;
            $result = ["result" => $sum];
            break;
        case "divide":
            $sum = $number1 / $number2;
            $result = ["result" => $sum];
    }
}
 echo json_encode($result);
?>