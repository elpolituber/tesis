<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class ProjectActivities extends Model
{
    use \OwenIt\Auditing\Auditable;
    //
    protected $connection = 'pgsql-vinculacion';
}
