<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'type' => ['required', 'string', Rule::in(['I', 'B', 'i', 'b'])],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('customers')->ignore($this->customer)],
                'phone' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'state' => ['required', 'string', 'max:255'],
                'postalCode' => ['required'],
            ];
        } else {
            return [
                'type' => ['sometimes','required', 'string', Rule::in(['I', 'B', 'i', 'b'])],
                'name' => ['sometimes','required', 'string', 'max:255'],
                'email' => ['sometimes','required', 'string', 'email', 'max:255', Rule::unique('customers')->ignore($this->customer)],
                'phone' => ['sometimes','required', 'string', 'max:255'],
                'address' => ['sometimes','required', 'string', 'max:255'],
                'city' => ['sometimes','required', 'string', 'max:255'],
                'state' => ['sometimes','required', 'string', 'max:255'],
                'postalCode' => ['sometimes','required'],
            ];
        }
    }
}
