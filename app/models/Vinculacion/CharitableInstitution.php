<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;
//use OwenIt\Auditing\Contracts\Auditable;
class CharitableInstitution extends Model
{
   // use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-vinculacion';
     //utilizacion para el tipo json 
     protected $casts=[
        'indirect_beneficiaries'=>'array',
        'direct_beneficiaries'=>'array',
    ];
}
