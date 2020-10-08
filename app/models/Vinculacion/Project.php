<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Contracts\Auditable;

class Project extends Model
{
    //use \OwenIt\Auditing\Auditable;
   // protected $table="vinculacion.projects";
    protected $connection = 'pgsql-vinculacion';
    //utilizacion para el tipo json 
    protected $casts=[
        'cycle'=>'array',
        'bibliografia'=>'array',
    ];
    //
}
