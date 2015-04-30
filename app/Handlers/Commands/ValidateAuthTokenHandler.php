<?php namespace App\Handlers\Commands;

use App\Acme\Repositories\Token\TokenEloquentRepository;
use App\Commands\ValidateAuthToken;

use App\Token;
use Carbon\Carbon;

use Illuminate\Support\Facades\Session;

class ValidateAuthTokenHandler
{
    /**
     * @var TokenEloquentRepository
     */
    private $tokenRepo;
    /**
     * @var Token
     */
    private $token;

    /**
     * Create the command handler.
     *
     * @param TokenEloquentRepository $tokenRepo
     * @param Token $token
     */
    public function __construct(TokenEloquentRepository $tokenRepo, Token $token)
    {
        $this->tokenRepo = $tokenRepo;
        $this->token = $token;
    }

    /**
     * Handle the command.
     *
     * @param  ValidateAuthToken $command
     * @return void
     */
    public function handle(ValidateAuthToken $command)
    {
        $this->trySignIn($command->token);
    }

    /**
     * @param $token
     */
    private function trySignIn($token)
    {
        (count($this->tokenRepo->retrieveUserByHash($token)) > 0) ?
            $this->validateHash($this->tokenRepo->retrieveUserByHash($token)) :
            $this->setAuth(false, 'Hash database lookup failed.');
    }

    /**
     * @param bool $status
     * @param null $reason
     */
    private function setAuth($status = false, $reason = null)
    {
        Session::put('App.User.Auth.status', $status);
        Session::put('App.User.Auth.reason', $reason);
    }

    /**
     * @param $user
     */
    private function validateHash($user)
    {
        if ($user[0]->present()->hashExpires()->gt(Carbon::now()))
        {
            $this->signIn($user[0]);
        } else {
            $this->setAuth(false, 'Hash is expired.');
        }
    }

    /**
     * @param $user
     */
    private function signIn($user)
    {
        $this->setAuth(true);
        Session::put('App.User.Email', $user->email);
        Session::put('App.User.FullName', $user->present()->fullName());
        $this->deleteHashFromDb($user->hash);
    }

    /**
     * @param $token
     */
    private function deleteHashFromDb($token)
    {
        $this->tokenRepo->deleteUserByHash($token);
    }
}
