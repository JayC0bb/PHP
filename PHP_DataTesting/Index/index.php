<?php

function test_input($input) {
    return $input;
}

function get_result_int() {
    $input_int = 42;
    return test_input($input_int);
}

function get_result_float() {
    $input_float = 3.14;
    return test_input($input_float);
}

function get_result_string() {
    $input_string = 'hello';
    return test_input($input_string);
}

function get_result_array() {
    $input_array = array(1, 2, 3);
    return test_input($input_array);
}

function get_result_object() {
    $input_object = new stdClass();
    return test_input($input_object);
}

var_dump(get_result_int());
var_dump(get_result_float());
var_dump(get_result_string());
var_dump(get_result_array());
var_dump(get_result_object());

?>