<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiKeyRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        if($this->ip_addresses !== null) {
            $this->merge(['ip_addresses' => explode(',', preg_replace("/\s+/", "", $this->ip_addresses))]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        ];
    }
}
