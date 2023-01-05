<?php

$response = [];
$data = $_POST;
$operation = $_REQUEST["url"];
$numbers = $data["numbers"];

function error($message) {
  $response = ["report" => "ERR", "result" => $message];
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($response);
  exit;
}

function success($result) {
  $response = ["report" => "OK", "result" => $result];
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($response);
  exit;
}

function performOperation($operation, $numbers) {
  if (count($numbers) < 2) {
    error("Not enough numbers. At least two are required.");
  }

  switch ($operation) {
    case "sum":
      success(array_sum($numbers));
      break;
    case "sub":
      success(array_reduce($numbers, function($a, $b) { return $a - $b; }));
      break;
    case "mul":
      success(array_reduce($numbers, function($a, $b) { return $a * $b; }));
      break;
    case "div":
      success(array_reduce($numbers, function($a, $b) { return $a / $b; }));
      break;
    case "mod":
      success(array_reduce($numbers, function($a, $b) { return $a % $b; }));
      break;
    case "sqrt":
      if (count($numbers) > 1) {
        error("Too many numbers. Sqrt takes only one.");
      }
      success(sqrt(floatval($numbers[0])));
      break;
    default:
      error("Input error.");
  }
}

performOperation($operation, $numbers);

?>