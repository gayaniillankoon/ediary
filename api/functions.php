<?php

function createAPIResponse($data, $success, $status){
    $response= (object) array();
			
    $response->success = $success;
    $response->stauts =  $status;
    $response->data = $data;

    return json_encode($response, true);
}

?>