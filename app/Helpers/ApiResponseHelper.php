<?php 

namespace App\Helpers;

class ApiResponseHelper{

    public static function jsonResponse($status, $message, $data=null){
        $response=[
            "status"=>$status,
            "message"=>$message
        ];
        if(!is_null($data)){
            $response["data"]=$data;
        }
        return response()->json($response);
    }
}



