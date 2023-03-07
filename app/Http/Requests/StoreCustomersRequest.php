<?php

namespace App\Http\Requests;

class StoreCustomersRequest extends BaseRequest
{
    /**
     * Validate the request body for storing a new customer.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['string', 'required'],
            'cpf' => ['string', 'regex:/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/', 'required', 'unique:customers,cpf'],
            'phone' => ['string', 'regex:/^\([0-9]{2}\) [0-9]{4}\-[0-9]{4}$|^\([0-9]{2}\) [0-9]{5}\-[0-9]{4}$/', 'nullable'],
            'birthday' => ['date', 'date_format:Y-m-d', 'required'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.string' => trans('common.validation.string', [ 'field' => 'full_name' ]),
            'full_name.required' => trans('common.validation.required', [ 'field' => 'full_name' ]),
            'cpf.string' => trans('common.validation.string', [ 'field' => 'cpf' ]),
            'cpf.unique' => trans('common.validation.unique', [ 'resource' => trans('common.resources.customer'), 'field' => 'cpf' ]),
            'cpf.regex' => trans('common.validation.regex', [ 'field' => 'cpf' ]),
            'cpf.required' => trans('common.validation.required', [ 'field' => 'cpf' ]),
            'birthday.required' => trans('common.validation.required', [ 'field' => 'birthday' ]),
            'birthday.date' => trans('common.validation.date', [ 'field' => 'date' ]),
            'birthday.date_format' => trans('common.validation.date_format', [ 'field' => 'birthday', 'format' => 'ano-mês-dia' ]),
            'phone.string' => trans('common.validation.string', [ 'field' => 'phone' ]),
            'phone.regex' => trans('common.validation.regex', [ 'field' => 'phone' ]),
        ];
    }
}
