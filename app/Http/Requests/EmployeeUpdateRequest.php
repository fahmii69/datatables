<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array<string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'email' => [
                'required',
                Rule::unique(Employee::class, 'email')->ignore($this->employee)
            ],
            'no_tlp' => 'required|digits:12',
            'id_company' => 'required',
        ];
    }

    /**
     * Validation custom message.
     *
     * @return array<string>
     */
    public function messages(): array
    {
        return [
            'name.required'       => '*Nama wajib diisi !.',
            'address.required'    => '*Alamat wajib diisi !',
            'email.required'      => '*Email wajib diisi !',
            'no_tlp.required'     => '*No Telepon wajib diisi !',
            'no_tlp.digits'       => '*No Telepon wajib 12 angka !',
            'id_company.required' => '*Company wajib diisi !',
        ];
    }
}