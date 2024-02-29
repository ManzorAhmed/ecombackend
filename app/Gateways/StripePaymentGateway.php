<?php
namespace App\Gateways;
use App\Contracts\PaymentGatewayInterface;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function processPayment(array $data)
    {
//        \Stripe\Stripe::setApiKey('your-stripe-api-key');
    }
}

