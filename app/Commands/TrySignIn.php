<?php namespace App\Commands;

class TrySignIn extends Command {

    /**
     * Create a new command instance.
     *
     * @param $hash
     */
	public function __construct($hash)
	{
		$this->hash = $hash;
	}

}
