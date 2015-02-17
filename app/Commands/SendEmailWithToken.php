<?php namespace App\Commands;

use App\Commands\Command;

class SendEmailWithToken extends Command {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($email)
	{
        $this->email = $email;
	}

}
