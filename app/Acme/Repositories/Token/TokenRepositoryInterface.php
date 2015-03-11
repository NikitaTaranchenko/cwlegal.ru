<?php namespace Acme\Repositories\Token;

interface TokenRepositoryInterface {

    public function store($hash, $email);
    public function flush();
    public function findByEmail($email);

}