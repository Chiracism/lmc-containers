<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'client_id' => ['required'],
        'client_name' => ['required'],
        'client_impot' => ['required'],
        'client_idnat' => ['required'],
        'address' => ['required'],
        'phone'  => ['required'],
        'email' => ['required'],
        'activity' => ['required']
        ];
    }
}
