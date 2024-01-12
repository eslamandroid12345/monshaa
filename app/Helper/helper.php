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
            'message' => $validator->errors()->first(),
            'code' => 422,

        ], 422));
    }
}
