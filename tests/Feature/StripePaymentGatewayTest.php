<?php
use Tests\TestCase;
use App\Gateways\StripePaymentGateway;
use App\Repositories\ApiPaymentGatewayRepository;

class StripePaymentGatewayTest extends TestCase
{
    public function testProcessPayment()
    {
        // Mock the ApiPaymentGatewayRepository
        $repository = $this->getMockBuilder(ApiPaymentGatewayRepository::class)
            ->onlyMethods(['getApiKey'])
            ->getMock();

        // Set up the expected behavior for the mocked method
        $repository->expects($this->once())
            ->method('getApiKey')
            ->with($this->equalTo(1))
            ->willReturn('pk_test_51KqaRXAO5m7niugkxHLrPiGWLqD8EnDdrwFug2haszl7y9ULjzwLsoOJ9WJ25K2Qk6gGTEw6zMd19XWCjJntJJ0Q00H1IBlyyL');

        // Use the mocked repository in your test case
        $gateway = new StripePaymentGateway($repository);
        $result = $gateway->processPayment([
            'gateway_id' => 1,
            'amount' => 1000,
            'currency' => 'USD',
            'token' => 'stripe-token',
            'description' => 'Test payment',
        ]);

        // Add assertions to verify the expected behavior
        $this->assertEquals('expected-result', $result); // Modify this assertion as needed
    }
}
