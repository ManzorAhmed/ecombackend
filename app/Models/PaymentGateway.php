<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = [
       'name',
       'api_key',
       'api_key',
        'currency',
        'min_amount',
        'max_amount',
    ];
}
