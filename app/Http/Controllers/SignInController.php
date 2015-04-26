<?php namespace App\Http\Controllers;


use App\Acme\Repositories\Token\TokenEloquentRepository;
use App\Commands\SendEmailWithToken;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AuthPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller {

	public function index()
    {
        return view('signIn.index');
    }

    public function post(AuthPostRequest $request)
    {
//        $this->dispatch(
//            new SendAuthEmail($request->input('email'))
//        );

        return view('signIn.authEmailSent');
    }

}
