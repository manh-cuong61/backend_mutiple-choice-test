<?php

namespace App\Http\Requests;

use App\Exceptions\CustomException;
use App\Utilities\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    //put your code here
    /**
     * @throws \Illuminate\Validation\HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $oldInvalidArray = $validator->errors()->toArray();
        $newInvalidArray = [];

        foreach ($oldInvalidArray  as $invalidElementKey => $value) {
            $newInvalidArray[$invalidElementKey] = $value[0];
        }

        throw new CustomException(__('messages.errors.E9993'), errorCode: 'E9993', errors: $newInvalidArray, statusCode: StatusCodes::BAD_REQUEST);
    }
}
