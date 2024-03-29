<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveAbudhabi extends Model
{
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
