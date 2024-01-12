<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait Responser
{


    public function responseSuccess($data = null,$code, $message = '',$status = 200) {
        return response()->json([
            'data' => $data,
            'code' => $code,
            'message' => $message,
            'status' => true
        ], $status);
    }

    public function responseFail($data = null,$code, $message = '',$status = 200) {
        return response()->json([
            'data' => $data,
            'code' => $code,
            'message' => $message,
            'status' => false

        ], $status);
    }


}
