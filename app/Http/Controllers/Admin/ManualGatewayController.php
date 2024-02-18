<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use Faker\Provider\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManualGatewayController extends Controller
{
    public function index()
    {
        $PaymentTitle = 'Manual-gateway';
        $gateways = Gateway::manual()->orderBy('id','desc')->get();
        return view('admin.gateway_manual.index', compact('gateways', 'PaymentTitle'));

    }

    public function create()
    {
        $PaymentTitle = 'New Payment Gateway';
        return view('admin.gateway_manual.create', compact('PaymentTitle'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'rate' => 'required',
            'currency' => 'required|numeric|gt:0',
            'min_limit' => 'required|numeric|gt:0',
            'max_limit' => 'required|numeric|gt:' . $request->min_limit,
            'fixed_charge' => 'required|numeric|gte:0',
            'percent_charge' => 'required|numeric|between:0,100',
            'field_name' => 'required_without:field_level,type,validation',
        ], [
            'field_name' => 'All field is required',
        ]);

        $lastMethod = Gateway::manual()->orderBy('id', 'desc')->first();
        $methodCode = 1000;
        if ($lastMethod) {
            $methodCode = $lastMethod->code + 1;
        }

        $inputForm = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace(' ', '_', trim($request->field_name[$a])));
                $arr['field_level'] = trim($request->field_name[$a]);
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $inputForm[$arr['field_name']] = $arr;
            }
        }

        $method = new Gateway();
        $method->code = $methodCode;
        $method->name = $request->name;
        $method->alias = strtolower(str_replace(' ', '_', $request->name));
        $method->status = 1; // Set a default status value.
        $method->gatewayparameter = json_encode($inputForm);
        $method->input_form = json_encode($inputForm);
        $method->supported_currencies = json_encode([]); // Provide an array of supported currencies here.
        $method->crypto = 0; // Set a default crypto value.
        $method->save();

        // Make sure $filename is defined with the correct image filename.
        $filename = 'your_image_filename.jpg'; // Replace with the actual image filename.

        $method->single_currency()->save(new GatewayCurrency([
            'name' => $request->name,
            'gateway_alias' => strtolower(trim(str_replace(' ','_',$request->name))),
            'currency' => $request->currency,
            'symbol' => '',
            'min_amount' => $request->min_limit,
            'max_amount' => $request->max_limit,
            'fixed_charge' => $request->fixed_charge,
            'percent_charge' => $request->percent_charge,
            'rate' => $request->rate,
            'image' => $filename,
            'gateway_parameter' => json_encode($inputForm),
        ]));

        Session::flash('success_message', 'Great! Manual Payment method Add successfully!');
    }


    public function edit($id)
    {
        $PayemntTitle = Payment::FindOrfail($id);
        return view('admin.gateways.edit', ['title' => 'Edit Gateways', 'gateways' , 'payment_tile' => $PayemntTitle]);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique,name|max:256',
        ]);
    }

    public function activated(Request $request)
    {
    $this->validate($request,['code'|'required integer']);
    $method = Gateway::where('code')->request('status');
    $method->status =1;
    }

}
