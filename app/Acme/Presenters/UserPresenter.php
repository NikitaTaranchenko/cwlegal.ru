<?php
/**
 * Created by PhpStorm.
 * User: NikitaTaranchenko
 * Date: 30/04/15
 * Time: 04:06
 */

namespace App\Acme\Presenters;


use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function fullName()
    {
        $name = explode('@', $this->email);
        $name = ucwords(implode(' ', explode('.', $name[0])));

        return $name;
    }

    public function authExpires()
    {
        return $this->created_at->addHours(48);
    }

    public function hashExpires()
    {
        return $this->created_at->addHours(24);
    }
}