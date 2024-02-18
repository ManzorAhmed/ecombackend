<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GatewayCurrency extends Model
{
    protected $casts = ['status' => 'boolean'];
    protected $guarded = ['id'];

    // Relation
    public function gateway()
    {
        return $this->belongsTo(Gateway::class, 'method_code', 'code');
    }

    public function currencyIdentifier()
    {
        return $this->name ?? $this->gateway->name . ' ' . $this->currency;
    }

    public function scopeBaseCurrency()
    {
        return $this->gateway->crypto == 1 ? 'USD' : $this->currency;
    }

    public function scopeBaseSymbol()
    {
        return $this->gateway->crypto == 1 ? '$' : $this->symbol;
    }

    public function scopeMethodImage()
    {
        return ($this->image) ? getImage(imagePath()['gateway']['path'] .'/' . $this->image,'800x800')
            : (($this->gateway->image) ? getImage(imagePath()['gateway']['path'] . '/' . $this->gateway->image,'800x800')
                : asset(imagePath()['image']['default']));
    }

}
