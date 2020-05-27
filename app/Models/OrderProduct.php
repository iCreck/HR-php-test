<?php

namespace App\Models;

use App\Models\Scopes\OrderProductDefaultScope;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected static function boot()
    {
        parent::boot();
        self::addGlobalScope(new OrderProductDefaultScope());
    }

    public function product()
    {
        return $this->belongsTo(Product::class)
            ->select(['id', 'name'])
            ->without('vendor');
    }
}
