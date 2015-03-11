<?php namespace App\Http\Controllers;


use App\Commands\UserRequestedNewToken;
use App\Http\Requests\TokenNewRequest;
use Illuminate\Support\Facades\Session;


class TokenController extends Controller
{

    public function getTokenNew()
    {
        return view('token.form');
    }


    public function postTokenNew(TokenNewRequest $request)
    {
        $email = $request->get('email');
        $this->dispatch(new UserRequestedNewToken($email));
    }

}
