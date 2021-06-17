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

    protected $fillable = ['client_email', 'partner_id', 'status'];

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
        return ['value' => $status, 'text' => self::STATUS[$status]];
    }

    public function getTotalAttribute()
    {
        return $this->items->reduce(function ($carry, $item) {
            return $carry + $item->quantity * $item->price;
        });
    }
}
