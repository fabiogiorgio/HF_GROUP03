<?php

require_once 'vendor/autoload.php';

use \Stripe\Customer;
use \Stripe\Charge;

/**
 * Class StripePayment
 */
class StripePayment
{

    private $apiKey;

    private $stripeService;

    public function __construct()
    {
        $this->apiKey = "sk_test_51Ix8qKHcvrzMwowCnN17GUOLSY1uAT7oV37RrOPZEMkAKBfgEEhTtySkdNYkj9GCbKA7KJ1s067FVV7ptJzOZDnb008ubph9r3";
        $this->stripeService = new \Stripe\Stripe();
        $this->stripeService->setVerifySslCerts(false);
        $this->stripeService->setApiKey($this->apiKey);
    }

    public function addCustomer($customerDetailsAry)
    {
        
        $customer = new Customer();
        
        $customerDetails = $customer->create($customerDetailsAry);
        
        return $customerDetails;
    }

    public function chargeAmountFromCard($cardDetails)
    {
        $customerDetailsAry = array(
            'email' => $cardDetails['email'],
            'source' => $cardDetails['stripeToken']
        );
        $customerResult = $this->addCustomer($customerDetailsAry);
        $charge = new Charge();
        $cardDetailsAry = array(
            'customer' => $customerResult->id,
            'amount' => $cardDetails['amount'] ,
            'currency' => $cardDetails['currency_code']
        );
        $result = $charge->create($cardDetailsAry);

        return $result;
    }
}
