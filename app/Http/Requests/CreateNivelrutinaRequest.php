<?php

namespace App\Http\Requests;

use App\Models\Nivel_rutina;
use Illuminate\Foundation\Http\FormRequest;

class CreateNivelrutinaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Nivel_rutina::rules();
    }
}
