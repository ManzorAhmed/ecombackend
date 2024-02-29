<?php

namespace App\Repositories;

use App\Contracts\PaymentGatewayInterface;
use App\Models\PaymentGateway;
use Stripe\Stripe;

class DatabasePaymentGatewayRepository implements PaymentGatewayInterface
{
    public function store(array $data)
    {
        return PaymentGateway::create($data);
    }
    public function processPayment(array $data)
    {
        {
            Stripe::setApiKey(config('services.stripe.secret'));

            try {
                $charge = Charge::create([
                    'amount' => $data['amount'] * 100, // Amount in cents
                    'currency' => $data['currency'],
                    'source' => $data['token'], // obtained with Stripe.js
                    'description' => $data['description'],
                ]);

                // Payment successful
                return $charge;
            } catch (\Exception $e) {
                // Payment failed
                return $e->getMessage();
            }
        }
    }
}
