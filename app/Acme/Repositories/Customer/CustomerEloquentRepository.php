<?php namespace App\Acme\Repositories\Customer;

use App\Customer as Customer;

class CustomerEloquentRepository implements CustomerRepositoryInterface {

    public function store($hash, $email)
    {
        $customer = new Customer;
        $customer->email = $email;
        $customer->hash = $hash;

        $customer->save();
    }

    public function getByHash($hash)
    {
        return Customer::where('hash', '=', $hash)->first();
    }

    public function deleteByHash($hash)
    {
        return Customer::where('hash', '=', $hash)->delete();
    }
}