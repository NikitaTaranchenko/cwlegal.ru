<?php namespace App\Handlers\Commands;

use App\Acme\Repositories\Token\TokenEloquentRepository;
use App\Commands\SendAuthEmail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendAuthEmailHandler {
    /**
     * @var TokenEloquentRepository
     */
    private $tokenRepo;

    /**
     * Create the command handler.
     * @param TokenEloquentRepository $tokenRepo
     */
	public function __construct(TokenEloquentRepository $tokenRepo)
	{
        $this->tokenRepo = $tokenRepo;
    }

    /**
     * Handle the command.
     *
     * @param SendAuthEmail $user
     */
	public function handle(SendAuthEmail $user)
	{
        /**
         * Store $token and $email in database;
         */
        $this->tokenRepo->store($user->token, $user->email);

        /**
         * Prepare data to send.
         */

        $link = route('auth.byToken', ['value'=>$user->token]);
        $data = compact('link');

        /**
         * Send email.
         */
        Mail::send('emails.static.auth.token', $data, function($message) use ($user)
        {
            $message->to('taranchenko@me.com', $user->name)->subject('Your link to CW Legal portal');
        });
//        Mail::send('emails.static.token_' . Session::get('locale'), $data, function($message) use ($user)
//        {
//            $message->to($user->email, $user->name)->subject(trans('login.emailSubj'));
//        });
	}

}
