<?php


namespace Resto2web\Core\Admin\Settings\Requests;


use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'facebook_url' => 'nullable',
        ];
    }
}
