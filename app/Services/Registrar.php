<?php namespace App\Services;

use Acme\Contracts\Auth\Registrar as RegistrarContract;
use Acme\Contracts\Auth\User;

class Registrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'email' => $data['email']
        ]);
    }
}