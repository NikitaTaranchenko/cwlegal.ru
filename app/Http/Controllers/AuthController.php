<?php namespace App\Http\Controllers;

use App\Commands\SendAuthEmail;
use App\Commands\TrySignIn;
use App\Http\Requests;
use App\Http\Requests\AuthPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller {

	public function index(Request $request)
    {
        if (null !== $request->segment('2'))
        {
            $this->dispatch(
                new TrySignIn($request->segment('2'))
            );

            dd(Session::all());
            return redirect('/');
        }

        return view('auth.index');
    }

    public function post(AuthPostRequest $request)
    {
        $this->dispatch(
            new SendAuthEmail($request->input('email'))
        );

        return view('auth.emailSent');
    }

}
