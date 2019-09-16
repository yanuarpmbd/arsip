<?php

namespace App\Models\Yanjin;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class KabKotaModel extends Model
{
    use Searchable;

    protected $table = 'kab_kota';

    protected $primaryKey = 'id';

    public $timestamps = false;
}

