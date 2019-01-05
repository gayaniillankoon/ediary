<?php

function createAPIResponse($data, $success, $status){
    $response = (object) [];
    $response->success = $success;
    $response->stauts =  $status;
    $response->data = $data;

    return json_encode($response, JSON_PRETTY_PRINT);
}

?>