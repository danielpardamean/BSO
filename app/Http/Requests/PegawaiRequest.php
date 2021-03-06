<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
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
        $nip = $this->get('nip');

        return [
            "nip" => 'required|unique:pegawai,nip,' . $nip . ',nip', 
            "name" => "required",
            "password" => "sometimes|required|confirmed",
            "type" => "required",
            "profile_picture" => "sometimes|file|max:5000"
        ];
    }
}
