<?php namespace App\Repositories;

use App\Token as Token;

class TokenEloquentRepository implements TokenRepositoryInterface {

    /**
     * Store a newly created token in storage
     *
     * @param $hash
     * @param $email
     * @return bool
     * @internal param $token
     */
    public function store($hash, $email)
    {
        $token = new Token;
        $token->email = $email;
        $token->hash = $hash;

        return $token->save();
    }
}