<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentstoreRequest;
use App\Models\PaymentGateway;
use App\Contracts\PaymentGatewayInterface;
use Illuminate\Support\Facades\Session;

class PaymentGatewayController extends Controller
{
    protected $paymentGatewayInterface;

    public function __construct(PaymentGatewayInterface $paymentGatewayInterface)
    {
        $this->paymentGatewayInterface = $paymentGatewayInterface;
    }

    public function index()
    {
        $gateways = PaymentGateway::get();
        return view('admin.gateways.index', ['title' => 'Payment Gateway Title', 'gateways' => $gateways]);
    }

    public function create()
    {
        return view('admin.gateways.create');
    }

    public function store(PaymentstoreRequest $request)
    {
        try {
            $gatewayData = $request->validated();
            $this->paymentGatewayInterface->store($gatewayData);
            Session::flash('success_message', 'Great! Payment Gateway has been added successfully.');
        } catch (\Exception $e) {
            Session::flash('error_message', 'Error occurred while adding Payment Gateway: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
