<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name',
      'slug',
      'description',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function getProductNameAttributes($value)
    {
        return $this->attributes['name'] = $value;
    }
}
