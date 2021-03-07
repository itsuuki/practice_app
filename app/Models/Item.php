<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_price',
        'region',
        'detail',
    ];

    public function commodities()
    {
        return $this->hasMany('App\Commodity');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'favorites', 'shop_id', 'user_id');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
    // public function toArray($requset)
    // {
    //     return ['title' => $this->title];
    // }
}
