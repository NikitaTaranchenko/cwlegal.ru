<?php namespace App\Repositories;

interface TokenRepositoryInterface {

    public function store($email, $token);

}