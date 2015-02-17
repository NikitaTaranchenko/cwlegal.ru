<?php namespace App\Http\Controllers;

use App\Commands\Command;
use App\Events\UserSwitchedLocale;
use App\Handlers\Events\SwitchLocale;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LocaleController extends Controller {

    public function __construct()
    {

    }

//    public function changeLang($locale)
//    {
//        event(new UserSwitchedLocale());
//    }

    public function changeLang($locale)
    {

    }


}
