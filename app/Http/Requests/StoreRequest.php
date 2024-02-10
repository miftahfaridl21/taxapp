<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'tanggal' => 'required',
            'jenis_pajak' => 'required',
            'jumlah_omset' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Field Tanggal harus diisi!',
            'jenis_pajak.required' => 'Field Jenis Pajak harus diisi',
            'jumlah_omset.required' => 'Field Jumlah Omset harus diisi',
            'user_id.required' => 'Field User harus diisi'
        ];
    }
}
