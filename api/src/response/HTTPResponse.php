<?php

namespace App\response;

class HTTPResponse {
    public static function json(int $code, $data) {
        $response = array();
        switch (gettype($data)) {
            case 'array':
                foreach ($data as $dto) {
                    $response[] = $dto->jsonSerialize();
                }
                break;
            case 'object':
                    $response = $data->jsonSerialize();
                break;
            case 'string':
                $response = ['message' => $data, 'status' => $code];
                break;
            case 'boolean':
                if ($data == true){
                    $response = ['message' => 'La operacion se ha realizado correctamente', 'status' => $code];
                } else {
                    $response =  ['message' => 'La operacion no se ha realizado correctamente', 'status' => $code];
                }
                break;
        }
        header('Content-Type:application/json');
        http_response_code($code);
        echo json_encode($response);
    }

}