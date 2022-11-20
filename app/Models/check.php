<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check extends Model
{
    use HasFactory;

    protected $table = 'checks';

    protected $fillable = [
        'produk_id',
        'user_id',
        'harga',
        'kuantitas',
        'check_produk',
        'total'
    ];

    protected $with = ['produk'];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'produk_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
