<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanRequest extends FormRequest
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
            "id_bimbingan" => "sometimes|required",
            "title" => "required",
            "dokumen" => "required|file|max:5000",
            "nip" => "required|exists:pegawai,nip"
        ];
    }
}
