<?php namespace App\Acme\Repositories\Customer;

interface CustomerRepositoryInterface {

    public function store($hash, $email);

    public function getByHash($hash);

    public function deleteByHash($hash);

}