<?php namespace App\Handlers\Commands;

use App\Commands\SendEmailWithToken;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendEmailWithTokenHandler {

    /**
     * Create the command handler.
     *
     */
	public function __construct()
	{
		//
	}

    /**
     * Handle the command.
     *
     * @param SendEmailWithToken $user
     * @internal param SendEmailWithToken $command
     */
	public function handle(SendEmailWithToken $user)
	{
        $link = route('token.insert', ['md5'=>$user->token, 'email'=>urlencode($user->email)]);
        $data = compact('link');

        Mail::send('emails.static.token_' . Session::get('locale'), $data, function($message) use ($user)
        {
            $message->to($user->email, $user->name)->subject(trans('login.emailSubj'));
        });
	}

}
