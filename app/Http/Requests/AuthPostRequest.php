<?php
/**
 * Created by PhpStorm.
 * User: NikitaTaranchenko
 * Date: 26/04/15
 * Time: 06:46
 */

namespace App\Http\Requests;


class AuthPostRequest extends Request {

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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|regex:([a-z]+\.[a-z]+\@(eur.cushwake.com))'
        ];
    }

}