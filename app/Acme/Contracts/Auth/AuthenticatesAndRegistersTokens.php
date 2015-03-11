<?php namespace Acme\Contracts\Auth;


use Illuminate\Http\Request;

trait AuthenticatesAndRegistersTokens {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    protected $registrar;

    /**
     * Show the token registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getToken()
    {
        return view('auth.token');
    }

    /**
     * Handle a token registration request for the application.
     *
     */
    public function postToken(Request $request)
    {

    }
}