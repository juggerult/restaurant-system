<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['meals', 'price', 'adress', 'timeAcceptCook', 'timeDoneCook', 'cook_id', 'timeAcceptDelivery', 'timeDoneDeveliry', 'provider_id', 'users_id'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
