<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SynonymsPoolAddValidator extends FormRequest
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
     * Get the validation rules for adding synonyms.
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return array
     */
    public function rules()
    {
        return [
            'synonyms'=>'required|array',
            'meaning'=> 'required',
        ];
    }
}
