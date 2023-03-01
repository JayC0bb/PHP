<?php

$operation = getOperationFromRequestUri();
$numbers = getNumbersFromRequestUri();

switch ($operation) {
    case "sum":
        if (count($numbers) < 2) {
            $result = "Not enough numbers. At least two.";
            break;
        }
        $result = array_sum($numbers);
        break;

    case "sub":
        if (count($numbers) < 2) {
            $result = "Not enough numbers. At least two.";
            break;
        }
        $result = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $result -= $number;
        }
        break;

    case "mul":
        if (count($numbers) < 2) {
            $result = "Not enough numbers. At least two.";
            break;
        }
        $result = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $result *= $number;
        }
        break;

    case "div":
        if (count($numbers) < 2) {
            $result = "Not enough numbers. At least two.";
            break;
        }
        $result = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $result /= $number;
        }
        break;

    case "mod":
        $result = $numbers[0];
        array_shift($numbers);
        foreach ($numbers as $number) {
            $result %= $number;
        }
        break;

    case "sqrt":
        if (count($numbers) > 1) {
            $result = "Too many numbers. Sqrt takes only one.";
            break;
        }
        $result = sqrt(floatval($numbers[0]));
        break;

    default:
        $result = "Input error.";    
}

echo json_encode([
    "report" => (is_numeric($result)) ? "OK" : "ERR",
    "result" => $result
]);

function getOperationFromRequestUri() {
    $data = $_SERVER["REQUEST_URI"];
    $data = explode("/", $data);
    return $data[3];
}

function getNumbersFromRequestUri() {
    $data = $_SERVER["REQUEST_URI"];
    $data = explode("/", $data);
    for($i = 0; $i<4; $i++) {
        array_shift($data);
    }
    return $data;
}

?>