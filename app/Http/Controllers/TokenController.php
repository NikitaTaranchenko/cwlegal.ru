<?php namespace App\Http\Controllers;

use App\Commands\SendEmailWithToken;
use App\Http\Requests;
use App\Http\Requests\TokenFormSubmittedRequest;


class TokenController extends Controller {

	public function showForm()
    {
        return view('token.form');
    }


    public function formSubmitted(TokenFormSubmittedRequest $request)
    {
        $this->dispatch(new SendEmailWithToken($request->get('email')));
        return "Email sent!";
    }

}
