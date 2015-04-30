<?php namespace App\Handlers\Commands;

use App\Acme\Repositories\Customer\CustomerEloquentRepository;
use App\Commands\TrySignIn;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class TrySignInHandler
{
    /**
     * @var CustomerEloquentRepository
     */
    private $customerRepo;
    /**
     * @var Customer
     */
    private $customer;

    /**
     * Create the command handler.
     *
     * @param CustomerEloquentRepository $customerRepo
     * @param Customer $customer
     */
    public function __construct(CustomerEloquentRepository $customerRepo, Customer $customer)
    {
        $this->customerRepo = $customerRepo;
        $this->customer = $customer;
    }

    /**
     * Handle the command.
     *
     * @param TrySignIn $command
     */
    public function handle(TrySignIn $command)
    {
        $customer = $this->customerRepo->getByHash($command->hash);

        (count($customer) > 0) ?
            $this->trySignIn($customer) :
            $this->setAuthStatus(false) & $this->setAuthReason('customerNotFound', true);
    }

    private function setAuthStatus($bool = false)
    {
        Session::put('auth.status', $bool);
    }

    private function setAuthReason($reason = null, $bool = null)
    {
        Session::put('auth.reason.'.$reason, $bool);
    }

}
