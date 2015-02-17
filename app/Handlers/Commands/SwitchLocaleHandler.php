<?php namespace App\Handlers\Commands;

use App\Commands\SwitchLocale;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class SwitchLocaleHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  SwitchLocale  $command
	 * @return void
	 */
	public function handle(SwitchLocale $command)
	{
		Session::put('locale', $command->locale);
	}

}
