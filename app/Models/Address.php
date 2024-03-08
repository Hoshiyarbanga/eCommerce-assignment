<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'name', 'mobile', 'pin_code', 'area', 'city', 'state', 'landmark', 'address-type', 'user_id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
