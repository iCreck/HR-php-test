<?php

namespace App\Models;

use App\Models\Scopes\ProductDefaultScope;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ProductDefaultScope());
    }

    protected $fillable = ['price'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
