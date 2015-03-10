<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Repositories\TokenRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
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
    /**
     * @var TokenRepository
     */
    private $tokenRepository;

    public function __construct(Application $app, Config $config, TokenRepository $tokenRepository)
    {

        $this->app = $app;
        $this->config = $config;
        $this->tokenRepository = $tokenRepository;
    }

	public function index()
    {
        $token = $this->tokenRepository->getNew('nikita.taranchenko@eur.cushwake.com');
        $link = route('token.insert', ['md5'=>$token, 'email'=>urlencode('nikita.taranchenko@eur.cushwake.com')]);
        return $link;
    }

    public function clearSession()
    {
        Session::flush();
        return redirect()->route('show.token.form');
    }

    public function sendMail()
    {
        $email['address'] = 'taranchenko@me.com';
        $email['user'] = 'Nikita Taranchenko';

        Mail::later(5, 'emails.test', ['key' => 'value'], function($message) use ($email)
        {
            $message->to($email['address'], $email['user'])->subject('Welcome!');
        });
    }

}
