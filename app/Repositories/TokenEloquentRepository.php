<?php namespace App\Repositories;

use App\Token as Token;

class TokenEloquentRepository implements TokenRepositoryInterface {

    /**
     * Store a newly created token in storage
     *
     * @param $email
     * @param $token
     */
    public function store($email, $token)
    {
        $token = new Token;
        $token->email = $email;
        $token->value = $token;
        $token->save();
    }
}