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
        /**
         * Extract name of user from email address
         * qualifying to pattern name.surname@eur.cushwake.com
         */
        $name = explode('@', $email);
        $name = ucwords(implode(' ', explode('.', $name[0])));

        /**
         * Calculate md5 hash as @param $token.
         */
        $hash = md5($email . microtime() . 'cwanywheresalt');

        /**
         * Pass values to Command's parameters.
         */
       	$this->email = $email;
        $this->name = $name;
        $this->hash = $hash;
	}
}
