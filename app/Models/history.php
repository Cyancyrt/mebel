<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = [
        'status_id',
        'user_id',
        'produk',
        'kuantitas',
        'harga',
        'total',
        'alamat'
    ];
    public function status()
    {
        return $this->belongsTo(status::class, 'status_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
