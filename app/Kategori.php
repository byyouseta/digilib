<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama', 'keterangan'
    ];

    public function book()
    {
        return $this->hasMany('App\Book');
    }

    public static function dokumen()
    {
        $dokumen = Kategori::all();

        return $dokumen;
    }
}
