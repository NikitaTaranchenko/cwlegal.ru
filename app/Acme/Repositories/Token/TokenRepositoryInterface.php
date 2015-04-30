<?php namespace App\Acme\Repositories\Token;

interface TokenRepositoryInterface {

    public function store($hash, $email);

    public function retrieveUserByHash($hash);

    public function deleteUserByHash($hash);

}