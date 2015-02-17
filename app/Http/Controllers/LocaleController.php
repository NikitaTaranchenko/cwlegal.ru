<?php namespace App\Http\Controllers;

use App\Commands\SwitchLocale;
use App\Http\Requests;

class LocaleController extends Controller {

    public function __construct()
    {

    }

    public function changeLang($locale)
    {
        $this->dispatch(new SwitchLocale($locale));

        return redirect()->route('show.token.form');
    }


}
