<?php namespace App\Acme\Repositories\Token;

use App\Token as Token;

class TokenEloquentRepository implements TokenRepositoryInterface {

    public function store($hash, $email)
    {
        $token = new Token;
        $token->email = $email;
        $token->hash = $hash;

        $token->save();
    }

    public function retrieveUserByHash($hash)
    {
        return Token::where('hash', '=', $hash)->get();
    }

    public function deleteUserByHash($hash)
    {
        return Token::where('hash', '=', $hash)->delete();
    }
}