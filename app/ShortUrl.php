<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $table = 'shorturl';

    function OriginalUrl() {
        return $this->hasOne('App\OriginalUrl','id','id_urloriginal');
    }
}
