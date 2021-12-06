<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pengirim', 'email', 'pesan', 'perihal', 'dibaca'
    ];

    public static function dibaca()
    {
        $baru = Pesan::where('dibaca', '=', 0)->count();

        return $baru;
    }
}
