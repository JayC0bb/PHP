<?php

$data = [
    'numbers' => [1, 5, 8],
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];
$context = stream_context_create($options);
$result = file_get_contents('http://localhost/my-app/f3/sum', false, $context);

echo $result;

?>