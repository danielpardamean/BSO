<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KoreksiRequest extends FormRequest
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
            "pengajuan_id" => "sometimes|required",
            "information" => "required",
            "dokumen" => "sometimes|file|max:5000"
        ];
    }
}
