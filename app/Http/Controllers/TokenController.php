<?php namespace App\Http\Controllers;


use App\Http\Requests\TokenNewRequest;


class TokenController extends Controller
{

    public function getNew()
    {
        return view('token.form');
    }


    public function postNew(TokenNewRequest $request)
    {
        $request->get('email');
    }

}
