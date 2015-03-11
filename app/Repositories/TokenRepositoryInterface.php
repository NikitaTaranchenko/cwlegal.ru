<?php namespace App\Repositories;

interface TokenRepositoryInterface {

    public function store($token, $email);

}