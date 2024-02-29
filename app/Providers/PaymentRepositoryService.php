<?php

namespace App\Providers;
use App\Contracts\PaymentGatewayInterface;
use App\Repositories\DatabasePaymentGatewayRepository;


use Illuminate\Support\ServiceProvider;

class PaymentRepositoryService extends ServiceProvider
{
    public function register()
    {
//        dd('Service Provider Register Method Called');
        // Bind PaymentGatewayInterface to DatabasePaymentGatewayRepository
        $this->app->bind(PaymentGatewayInterface::class, function ($app) {
            // Return instance of DatabasePaymentGatewayRepository
            return new DatabasePaymentGatewayRepository();
        });


    }

}
