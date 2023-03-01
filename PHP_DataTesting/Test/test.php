<?php

$data_types = array('int', 'float', 'string', 'array', 'object');

function test_input($input) {
    return $input;
}

foreach ($data_types as $data_type) {
    $function_name = 'get_result_' . $data_type;
    $input_variable = 'input_' . $data_type;

    $function = 'function ' . $function_name . '() {' . PHP_EOL;
    $function .= '    $' . $input_variable . ' = ';

    switch ($data_type) {
        case 'int':
            $function .= '42;' . PHP_EOL;
            break;
        case 'float':
            $function .= '3.14;' . PHP_EOL;
            break;
        case 'string':
            $function .= "'hello';" . PHP_EOL;
            break;
        case 'array':
            $function .= 'array(1, 2, 3);' . PHP_EOL;
            break;
        case 'object':
            $function .= 'new stdClass();' . PHP_EOL;
            break;
    }

    $function .= '    return test_input($' . $input_variable . ');' . PHP_EOL;
    $function .= '}' . PHP_EOL . PHP_EOL;

    eval($function);
}

foreach ($data_types as $data_type) {
    $function_name = 'get_result_' . $data_type;
    var_dump($function_name());
}

?>