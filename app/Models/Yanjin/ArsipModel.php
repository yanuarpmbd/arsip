<?php


namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class ArsipModel extends Model
{
    use Searchable;

    protected $table = 'arsip';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function sektor()
    {
        return $this->belongsTo('App\Models\Yanjin\SektorModel', 'sektor_id');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Models\Yanjin\JenisIzinModel', 'jns_izin_id');
    }

    public function pj()
    {
        return $this->belongsTo('App\Models\Yanjin\PjIzinModel', 'pj_izin_id');
    }

    public function lemari()
    {
        return $this->belongsTo('App\Models\Yanjin\LemariModel', 'lemari_id');
    }

    public function kabkota()
    {
        return $this->belongsTo('App\Models\Yanjin\KabKotaModel', 'kabkota_id');
    }
}
