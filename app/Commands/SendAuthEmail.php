<?php namespace App\Commands;

use App\Commands\Command;

/**
 * @property string email
 * @property string name
 */
class SendAuthEmail extends Command {

    /**
     * Create a new command instance.
     *
     * @param $email
     */
	public function __construct($email)
	{

        $name = explode('@', $email);
        $name = ucwords(implode(' ', explode('.', $name[0])));

       		$this->email = $email;
        	$this->name = $name;
        	$this->token = $token;
	}
}
