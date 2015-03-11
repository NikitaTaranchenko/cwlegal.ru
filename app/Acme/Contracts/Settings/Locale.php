<?php namespace Acme\Contracts\Settings;


interface Locale {

    /**
     * Sets the application's language to the specified.
     *
     * @param $lang
     * @return mixed
     */
    public function change($lang);

    /**
     * Determines if the requested language is available.
     *
     * @param $lang
     * @return bool
     */
    public function check($lang);
}