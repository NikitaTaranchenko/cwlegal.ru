<?php namespace Acme\Contracts\Auth;


interface Authenticatable {

    /**
     * Get the token for the user.
     *
     * @return string
     */
    public function getAuthToken();
}