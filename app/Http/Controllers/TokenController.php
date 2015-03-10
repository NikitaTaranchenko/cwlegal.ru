<?php namespace App\Http\Controllers;

use App\Commands\SendEmailWithToken;
use App\Http\Requests\TokenNewRequest;
use App\Repositories\TokenRepositoryInterface;


class TokenController extends Controller
{

    public function getNewToken()
    {
        return view('token.form');
    }


    public function setNewToken(TokenNewRequest $request, TokenRepositoryInterface $tokenRepository)
    {
        $email = $request->get('email');
        $token = md5($email . microtime() . env('APP_KEY'));

        $tokenRepository->store($email, $token);

        $this->dispatch(new SendEmailWithToken($email, $token));

        return "Email Sent";
    }



}
