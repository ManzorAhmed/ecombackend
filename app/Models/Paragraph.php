<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $fillable = ['heading', 'content'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
