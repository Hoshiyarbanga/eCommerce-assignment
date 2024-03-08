<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'category', 'sub_category', 'price', 'quantity', 'image', 'user_id'
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
