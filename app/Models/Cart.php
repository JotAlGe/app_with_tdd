<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['food_id'];

    protected $table = 'carts';

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
