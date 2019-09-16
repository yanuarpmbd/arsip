<?php

namespace App\Models\Yanjin;

use Illuminate\Database\Eloquent\Model;

class PivotPJ extends Model
{
    protected $table = 'pj_izin_jns_izin';

    public $timestamps = false;

    public function izin(){
        return $this->belongsTo(JenisIzinModel::class, 'jns_izin_id');
    }

    public function nama(){
        return $this->belongsTo(PjIzinModel::class,'pj_izin_id' ,'nama_pj');
    }
}
