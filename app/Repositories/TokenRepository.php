<?php
/**
 * Created by PhpStorm.
 * User: NikitaTaranchenko
 * Date: 10/03/15
 * Time: 06:36
 */

namespace App\Repositories;

use App\Token as Token;

class TokenRepository {

    public function __construct()
    {

    }

    public function getNew($email)
    {
        if (Token::where('email', '=', $email)->count() > 0)
        {
            Token::where('email', '=', $email)->delete();
        }

        $token = new Token;
        $token->md5 = md5($email . microtime() . 'nikitati');
        $token->email = $email;
        $token->save();

        return $token->md5;
    }

    public function validateInserted($token, $email)
    {
        $result = Token::whereRaw('md5 = ? and email = ?', [$token, urldecode($email)])->first()->get();
        dd($result->toArray()[0]['md5']);
    }

}