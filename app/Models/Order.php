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

    public function partner()
    {
        return $this->belongsTo(Partner::class)->select(['name', 'id']);
    }

    public function products()
    {
    }

    public function getStatusAttribute($status)
    {
        return self::STATUS[$status];
    }
}
