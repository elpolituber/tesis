<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class SpecificAim extends Model
{
    //use \OwenIt\Auditing\Auditable;
    //
    
    protected $connection = 'pgsql-vinculacion';
    protected $casts=[
        'verifications'=>'array',
    ];
}
