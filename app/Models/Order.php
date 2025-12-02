<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table='orders';

    public function items()
    {
        return $this->hasMany(OrderItems::class,'order_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
