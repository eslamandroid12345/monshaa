<?php


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

if(!function_exists('validationException')){

    /**
     * @throws ValidationException
     */
    function validationException(Validator $validator){

        throw new ValidationException($validator, response()->json([
            'data' => null,
            'code' => 422,
            'message' => $validator->errors()->first(),
            'status' => false,

        ], 422));
    }
}
