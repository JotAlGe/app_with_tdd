<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'food_id'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
