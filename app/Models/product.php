<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function presentPrice(){
        return '$' . number_format($this->price / 100, 2);
    }

    protected $fillable = ['name', 'description', 'price', 'brand'];

    public function scopeAlsoLike($query){
        return $query->inRandomOrder()->take(3);
    }
}
