<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterPaginateCustomersRequest extends BaseRequest
{
    /**
     * Validate the request query strings for filtering and pagination of customers.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'nullable'],
            'cpf' => ['string', 'regex:/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/', 'nullable'],
            'per_page' => ['integer', 'nullable'],
            'page' => ['integer', 'nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'search.string' => trans('common.validation.string', [ 'field' => 'search' ]),
            'cpf.string' => trans('common.validation.string', [ 'field' => 'cpf' ]),
            'cpf.regex' => trans('common.validation.regex', [ 'field' => 'cpf' ]),
            'per_page.integer' => trans('common.validation.integer', [ 'field' => 'per_page' ]),
            'page.integer' => trans('common.validation.integer', [ 'field' => 'page' ]),
        ];
    }
}
