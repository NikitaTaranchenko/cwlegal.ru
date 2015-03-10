<?php namespace App\Commands;

use App\Commands\Command;

/**
 * @property string email
 * @property string name
 */
class SendEmailWithToken extends Command {

    /**
     * Create a new command instance.
     *
     * @param $email
     */
	public function __construct($email, $token)
	{
	        $name = explode('@', $email);
        	$name = ucwords(implode(' ', explode('.', $name[0])));

       		$this->email = $email;
        	$this->name = $name;
        	$this->token = $token;
	}
}
