<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = ['email'];

    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
