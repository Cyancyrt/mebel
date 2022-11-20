<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected $table = 'tagging_tags';

    public function produk()
    {
        return $this->belongsToMany(produk::class, 'produk_tag', 'produk_id', 'tag_id');
    }
}
