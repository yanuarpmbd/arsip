<?php

namespace App\Models\Yanjin;
use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class SafModel extends Model
{

    use Searchable;

    protected $table = 'saf';

    protected $primaryKey = 'id';
}
