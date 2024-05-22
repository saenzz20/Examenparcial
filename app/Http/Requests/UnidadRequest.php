<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnidadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'codigo' => 'required|unique:unidad|max:255',
                    'nombre' => 'required|max:255',
                    'descripcion' => 'nullable',
                    'precio' => 'required|numeric|min:0',
                    'stock' => 'required|integer|min:0',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'codigo' => 'required|max:255|unique:unidad,codigo,' . $this->route('unidad'),
                    'nombre' => 'required|max:255',
                    'descripcion' => 'nullable',
                    'precio' => 'required|numeric|min:0',
                    'stock' => 'required|integer|min:0',
                ];
            default:
                return [];
        }
    }
}
