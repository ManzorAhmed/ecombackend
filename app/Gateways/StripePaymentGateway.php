<?php

namespace App\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\Repositories\ApiPaymentGatewayRepository;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentGateway implements PaymentGatewayInterface
{
    protected $paymentGatewayRepository;

    public function __construct(ApiPaymentGatewayRepository $paymentGatewayRepository)
    {
        $this->paymentGatewayRepository = $paymentGatewayRepository;
    }

    public function processPayment(array $data)
    {
        // Fetch the Stripe API key from the repository
        $stripeApiKey = $this->paymentGatewayRepository->getApiKey('stripe');

        // Initialize Stripe with the fetched API key
        Stripe::setApiKey($stripeApiKey);

        try {
            // Create a charge using Stripe API
            $charge = Charge::create([
                'amount' => $data['amount'] * 100, // Amount in cents
                'currency' => $data['currency'],
                'source' => $data['token'], // Token obtained from the client-side
                'description' => $data['description'],
            ]);

            // Return the charge object or any relevant data indicating success
            return $charge;
        } catch (\Exception $e) {
            // Handle exceptions (e.g., payment failure)
            return $e->getMessage();
        }
    }
}



