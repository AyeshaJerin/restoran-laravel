<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

     protected $table = 'category';

    protected $fillable = [
        'name',
    ];

    // Relationship: এক Category এর অনেকগুলো Food থাকতে পারে
    public function foods()
    {
        return $this->hasMany(Food::class, 'category_id');
    }

     public $timestamps = false;
}
