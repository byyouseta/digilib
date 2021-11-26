<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama', 'tahun', 'penerbit', 'penulis', 'jenis', 'dilihat', 'file', 'abstrak', 'tag'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
