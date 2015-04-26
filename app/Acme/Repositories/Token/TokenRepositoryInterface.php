<?php namespace App\Acme\Repositories\Token;

interface TokenRepositoryInterface {

    public function store($hash, $email);

}