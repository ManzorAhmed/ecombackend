<?php

namespace App\Repositories;

use App\Models\PaymentGateway;

class ApiPaymentGatewayRepository
{
    public function store(array $data)
    {
        return PaymentGateway::create($data);
    }

    public function findByApiKey(string $apiKey)
    {
        return PaymentGateway::where('api_key', $apiKey)->first();
    }

    public function getApiKey(string $gatewayName)
    {
        $gateway = PaymentGateway::where('name', $gatewayName)->first();

        return $gateway ? $gateway->api_key : null;
    }


    // You can add more methods here as needed, such as update, delete, etc.
}
