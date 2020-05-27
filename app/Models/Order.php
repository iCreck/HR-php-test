<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS = [
        0 => 'Новый',
        10 => 'Подтвержден',
        20 => 'Завершен',
    ];

    protected $appends = ['total'];

    public function partner()
    {
        return $this->belongsTo(Partner::class)->select(['name', 'id']);
    }

    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function getStatusAttribute($status)
    {
        return self::STATUS[$status];
    }

    public function getTotalAttribute()
    {
        $sums = $this->items->map(function ($item) {
            return $item->quantity * $item->price;
        });
        return $sums->sum();
    }
}
