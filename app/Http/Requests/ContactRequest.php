<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required',
            'address' => 'required',
            'open_time' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'wp_link' => 'required',
            'insta_link' => 'required',
        ];
    }
}
