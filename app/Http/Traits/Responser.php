<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait Responser
{


    public function responseSuccess($data = null,$code, $message = '',$status = 200,$newAttributeName = null,$newAttributeValue = null) {

        $array = [
            'data' => $data,
            'code' => $code,
            'message' => $message,
            'status' => true
        ];

        if($newAttributeName !== null && $newAttributeValue !== null){
           $array = array_merge($array,[$newAttributeName => $newAttributeValue]);
        }
        return response()->json($array, $status)->header('Access-Control-Allow-Origin', 'https://mymonshaa.web.app')
            ->header('Access-Control-Allow-Headers', '*');
    }

    public function responseFail($data = null,$code, $message = '',$status = 200) {
        return response()->json([
            'data' => $data,
            'code' => $code,
            'message' => $message,
            'status' => false

        ], $status)->header('Access-Control-Allow-Origin', 'https://mymonshaa.web.app')
            ->header('Access-Control-Allow-Headers', '*');
    }


}
