<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class TestController extends Controller {

    /**
     * @var Application
     */
    private $app;
    /**
     * @var Config
     */
    private $config;

    public function __construct(Application $app, Config $config)
    {

        $this->app = $app;
        $this->config = $config;
    }

	public function index()
    {
//        dd($this->config->getFacadeRoot()['app']['locales']);
        return $this->config->getFacadeRoot()['app']['locales'];
    }

    public function clearSession()
    {
        Session::flush();
        return redirect()->route('show.token.form');
    }

}
