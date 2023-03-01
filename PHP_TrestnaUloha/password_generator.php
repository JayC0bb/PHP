<?php
    // Check if the required parameters are present in the request
    if(!isset($_GET["length"]) || !isset($_GET["include_symbols"])){
        http_response_code(400);
        echo json_encode(array("error" => "Missing parameters"));
        exit();
    }
    // Get the parameters from the request
    $length = intval($_GET["length"]);
    $include_symbols = $_GET["include_symbols"] === "true" ? true : false;

    // String containing possible characters for the password
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    if($include_symbols){
        $chars .= "!@#$%^&*()-_=+[]{}|;:'\"<>,.?/\\";
    }

    // Initialize the password variable
    $password = "";

    // Generate a random password
    for($i = 0; $i < $length; $i++){
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    // Create the JSON response
    $response = array(
        'password' => $password
    );

    // Set the HTTP response code and content type
    http_response_code(200);
    header('Content-Type: application/json');

    // Return the JSON response
    echo json_encode($response);
?>