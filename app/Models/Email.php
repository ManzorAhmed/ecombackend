<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['title', 'template_key', 'subject', 'email_content', 'active'];

    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
}
