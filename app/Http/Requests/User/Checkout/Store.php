<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $expiredValidation = date('Y-m-d', time());
        return [
            'name'          => 'required|string',
            'email'         => 'required|email|unique:users,email,'.Auth::id().',id',
            'occupation'    => 'required|string',
            'card_number'   => 'required|numeric|digits_between:8,16',
            'expired'       => 'required|date|date_format:Y-m-d|after_or_equal:'.$expiredValidation,
            'cvc'           => 'required|numeric|digits:3'
        ];
    }
}
