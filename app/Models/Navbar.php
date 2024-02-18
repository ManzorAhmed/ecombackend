<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = 'navbars';

//    protected $fillable = [
//        'name',
//        'link',
//        'status',
//
//    ];
//    public function parent()
//    {
//        return $this->belongsTo(Navbar::class, 'parent_id');
//    }
//    public function childMenus()
//    {
//        return $this->hasMany(Navbar::class, 'parent_id');
//    }
//    public static function findOrFail($input)
//    {
//    }

    public function parent()
    {
        return $this->belongsTo(Navbar::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Navbar::class, 'parent_id');
    }
    public function childMenus()
    {
        return $this->hasMany(Navbar::class, 'parent_id');
    }

}
