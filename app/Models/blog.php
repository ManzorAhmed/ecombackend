<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = ['title'];

    public function paragraphs()
    {
        return $this->hasMany(Paragraph::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
