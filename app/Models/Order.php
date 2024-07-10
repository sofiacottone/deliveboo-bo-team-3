<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'address', 'phone_number', 'full_name', 'email'];


    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
