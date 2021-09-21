<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user())
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'email' => 'email|string|max:255',
            'name' => 'string|max:255',
            'phone' => ['regex:/[0-9]/','min:10','max:11'],
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
