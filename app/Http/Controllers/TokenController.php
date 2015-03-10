<?php namespace App\Http\Controllers;

use App\Commands\SendEmailWithToken;
use App\Http\Requests;
use App\Http\Requests\TokenFormSubmittedRequest;
use App\Repositories\TokenRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;


class TokenController extends Controller
{

    /**
     * @var TokenRepository
     */
    private $tokenRepo;

    public function __construct(TokenRepository $tokenRepo)
    {
        $this->tokenRepo = $tokenRepo;
    }

	public function formShow()
    {
        return view('token.form');
    }


    public function formSubmitted(TokenFormSubmittedRequest $request)
    {
        $email = $request->get('email');
        $token = $this->tokenRepo->getNew($email);
        
	$this->dispatch(new SendEmailWithToken($email, $token));
        return "Email sent!";
    }

    public function tokenInsert()
    {
        $this->tokenRepo->validateInserted(Input::get('md5'), Input::get('email'));
    }

}
