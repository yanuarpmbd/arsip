<?php

namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class PjIzinModel extends Model
{

    /*use Searchable;*/

    protected $table = 'pj_izin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
      'jns_izin_id' => 'array'
    ];
    public function jenis()
    {
        return $this->belongsToMany(JenisIzinModel::class, 'pj_izin_jns_izin', 'jns_izin_id', 'jns_izin_id');
    }

    public function namaizin()
    {
        return $this->hasMany(PivotPJ::class, 'jns_izin_id', 'jns_izin_id');
    }

    public function pivot(){
        return $this->hasMany(PivotPJ::class,'pj_izin_id'  , 'nama_pj');
    }

}
