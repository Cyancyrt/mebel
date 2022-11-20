<?php

namespace App\Models;

use App\Models\Kategori;


use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produk extends Model
{
    use HasFactory;
    use Taggable;


    protected $fillable = [
        'id',
        'produk',
        'image',
        'nama',
        'harga',
        'kategori_name',
        'kategori_id',

    ];
    protected $with = ['kategori'];

    protected $table = 'produks';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function check()
    {
        return $this->belongsTo(check::class);
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['kategori_id'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('name', $kategori);
            });
        });
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
}
