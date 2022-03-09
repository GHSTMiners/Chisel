<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiKeyRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->replace(['ip_addresses' => explode(',', preg_replace("/\s+/", "", $this->ip_addresses)),
                       'key' => $this->key,
                       'notes'=> $this->notes]);

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
