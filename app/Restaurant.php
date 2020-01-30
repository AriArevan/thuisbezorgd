<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'title', 'kvk', 'email', 'address', 'zipcode', 'city', 'phone', 'photo', 'image', 'is_open', 'is_closed',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function consumables()
    {
        return $this->hasMany('App\Consumable');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
    
}
