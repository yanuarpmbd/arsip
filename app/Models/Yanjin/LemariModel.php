<?php

namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class LemariModel extends Model
{
    use Searchable;

    protected $table = 'lemari';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function arsips()
    {
        return $this->hasMany('App\Models\Yanjin\ArsipModel', 'lemari_id');
    }

    public function sektor()
    {
        return $this->belongsTo('App\Models\Yanjin\SektorModel', 'sektor_id');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Models\Yanjin\JenisIzinModel', 'jns_izin_id');
    }
}
