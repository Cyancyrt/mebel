<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $fillable = [
        'produk_id',
        'status_id',
        'user_id',
        'email',
        'nama_user',
        'harga',
        'alamat',
        'kuantitas',
        'check_produk',
        'total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status()
    {
        return $this->belongsTo(status::class, 'status_id');
    }
}
