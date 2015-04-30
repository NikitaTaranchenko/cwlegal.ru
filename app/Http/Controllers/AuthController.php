<?php namespace App\Http\Controllers;


use App\Commands\SendAuthEmail;
use App\Commands\ValidateAuthToken;
use App\Http\Requests;
use App\Http\Requests\AuthPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller {

	public function index()
    {
        return view('auth.index');
    }

    public function post(AuthPostRequest $request)
    {
        $this->dispatch(
            new SendAuthEmail($request->input('email'))
        );

        return view('auth.emailSent');
    }

    public function byToken(Request $request)
    {
        $this->dispatch(
            new ValidateAuthToken($request->segments()[1])
        );

        return redirect('/');
    }
}
