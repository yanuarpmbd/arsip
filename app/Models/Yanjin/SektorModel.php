<?php

namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class SektorModel extends Model
{

    use Searchable;

    protected $table = 'sektor';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function arsips()
    {
        return $this->hasMany('App\Models\Yanjin\ArsipModel', 'sektor_id');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Models\Yanjin\JenisIzinModel');
    }

}
