<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

     protected $table = 'coupon'; // কারণ টেবিলের নাম plural না

    protected $fillable = [
        'name',
        'code',
        'amount',
        'start_date',
        'finish_date',
    ];
}
