<?php
namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required',
            'email' => 'required',
            'age'   => 'required',
        ];
    }

    /**
     * @return array
     */
    public function fieldInputs()
    {
        return [
            'name'       => $this->name,
            'email'      => $this->email,
            'age'        => $this->age,
            'password'   => Hash::make('password'),
        ];
    }
}
