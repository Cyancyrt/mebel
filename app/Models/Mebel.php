<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mebel extends Model
{
    use HasFactory;

    protected $table = 'mebels';

    protected $fillable = [
        'name',
        'price',
        'produk_id'
    ];
}
