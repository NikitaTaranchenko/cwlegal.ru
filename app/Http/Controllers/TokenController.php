<?php namespace App\Http\Controllers;

use App\Commands\SendEmailWithToken;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TokenFormSubmittedRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
