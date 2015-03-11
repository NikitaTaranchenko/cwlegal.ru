<?php namespace Acme\Contracts\Auth;


interface Guard {

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param array $credentials
     * @return mixed
     */
    public function attempt(array $credentials = array());

    /**
     * Determine if the current user is authenticated.
     *
     * @return mixed
     */
    public function check();

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest();

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout();
}