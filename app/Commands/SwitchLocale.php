<?php namespace App\Commands;

use App\Commands\Command;

class SwitchLocale extends Command {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($input)
	{
		$this->locale=$input;
	}

}
