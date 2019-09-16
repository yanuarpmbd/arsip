<?php

namespace App\Models\Yanjin;

use Illuminate\Database\Eloquent\Model;

class PinjamArsipModel extends Model
{
    protected $table = 'pinjam';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function izin()
    {
        return $this->belongsTo('App\Models\Yanjin\JenisIzinModel');
    }

    public function pj()
    {
        return $this->belongsTo('App\Models\Yanjin\PjIzinModel');
    }

    public function lemari()
    {
        return $this->belongsTo('App\Models\Yanjin\LemariModel', 'lemari_id');
    }


}
