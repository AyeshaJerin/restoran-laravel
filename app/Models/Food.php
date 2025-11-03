<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

     protected $table = 'food';

     protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'image',
    ];

    // সম্পর্ক: Food belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

     public $timestamps = false;
}
