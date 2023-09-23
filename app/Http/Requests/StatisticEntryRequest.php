<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticEntryRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        if($this->categories !== null) {
            $this->merge(['categories' => explode(',',  $this->categories)]);
        }

        if($this->categories !== null) {
            $this->merge(['values' => explode(',', preg_replace("/\s+/", "", $this->values))]);
        }
    }

    
    public function rules()
    {
        return [
            
        ];
    }
}
