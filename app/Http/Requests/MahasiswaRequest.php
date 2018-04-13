<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
        $nim = $this->get('nim');

        return [
            "nim" => 'required|unique:mahasiswa,nim,' . $nim . ',nim', 
            "name" => "required",
            "password" => "sometimes|required|confirmed",
            "programStudi" => "required",
            "profile_picture" => "sometimes|file|max:5000"
        ];
    }
}
