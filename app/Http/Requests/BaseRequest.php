<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors_messages = [];
        foreach($validator->errors()->messages() as $key => $value){
            $errors_messages[$key] = $value[0];
        }

        throw new HttpResponseException(
            response()->json(
                [
                    'validation_error' => $errors_messages
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
