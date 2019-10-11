<?php

namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class JenisIzinModel extends Model
{
    use Searchable;

    protected $table = 'jns_izin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function sektor()
    {
        return $this->belongsTo('App\Models\Yanjin\SektorModel');
    }

    public function pj()
    {
        return $this->belongsTo('App\Models\Yanjin\PjIzinModel');
    }

    public function piv(){
        return $this->belongsToMany(PjIzinModel::class, 'pj_izin_jns_izin', 'jns_izin_id', 'jns_izin_id');
    }

}
