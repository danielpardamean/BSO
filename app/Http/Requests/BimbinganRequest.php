<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BimbinganRequest extends FormRequest
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
            "nim" => "sometimes|required",
            "title" => "required",
            "tanggal_mulai_bimbingan" => "required",
            "pembimbing" => "present|required|array",
            "dokumen" => "sometimes|file|max:5000"
        ];
    }
}
