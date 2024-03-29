<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
 public function getEmailAttribute($value){
        return 'Mr '.$value;
 }
}
