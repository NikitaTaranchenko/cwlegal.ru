<?php namespace App\Handlers\Commands;

use App\Acme\Repositories\Customer\CustomerEloquentRepository;
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
     * @var CustomerEloquentRepository
     */
    private $customerRepo;

    /**
     * Create the command handler.
     * @param CustomerEloquentRepository $customerRepo
     */
	public function __construct(CustomerEloquentRepository $customerRepo)
	{
        $this->customerRepo = $customerRepo;
    }

    /**
     * Handle the command.
     *
     * @param SendAuthEmail $customer
     */
	public function handle(SendAuthEmail $customer)
	{
        /**
         * Store $hash and $email in Customers database;
         */
        $this->customerRepo->store($customer->hash, $customer->email);

        /**
         * Prepare data to send.
         */

        $link = route('auth.get', ['value'=>$customer->hash]);
        $data = compact('link');

        /**
         * Send email.
         */
        Mail::send('emails.static.auth.token', $data, function($message) use ($customer)
        {
            $message->to('taranchenko@me.com', $customer->name)->subject('Your link to CW Legal portal');
        });
//        Mail::send('emails.static.token_' . Session::get('locale'), $data, function($message) use ($user)
//        {
//            $message->to($user->email, $user->name)->subject(trans('login.emailSubj'));
//        });
	}

}
