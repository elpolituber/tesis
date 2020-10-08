<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('pgsql-ignug')->table('locations')->insert([
            'code'=> '100',
            'name'=> "500",
            'type'=> "200",
            'principal_street'=>'CASA',
            'secondary_street'=>"NO CASA",
            'state_id'=>1,
            ]);

        DB::connection('pgsql-vinculacion')->table('charitable_institutions')->insert([    
            'state_id'=>1,
            'ruc'=>'1234567891',
            'name'=>"FUNDACION VISTA PARA TODOS",
            'location_id'=>1, //fk propia
            'indirect_beneficiaries'=> json_encode([ 'bio']),
            'legal_representative_name'=>"RODRIGO",
            'legal_representative_lastname'=>"nogales",
            'legal_representative_identification'=>1725485277,
            'project_post_charge'=>"PRESIDENTE",//CARGO
            'direct_beneficiaries'=> json_encode(['VISTA PARA TODOS']),
            ]);
        
            DB::connection('pgsql-vinculacion')->table('projects')->insert([  
            'charitable_institution_id'=>1,                 
            'career_id'=>1,
            'assigned_line_id'=>45,//pendiente//lineas de investigacion
            'code'=>'yavirac1223',
            'name'=>'Systema ayuda a los pobres',
            'status_id'=>1,//catalogo propio una fk 
            'state_id'=>1,
            'field'=>"campo",//campo de area de vinculacion
            'aim'=>'objeto',//objeto
            'fraquency_id'=>41,//frecuencia de actividades
            //'cycle'=>"121",//ciclo
            'location_id'=>1,
            'lead_time'=>3,//plazo de ejecucion
            /* 'delivery_date'=>01/05/2020,// tiempo
            'start_date'=>11/05/2020,// tiempo
            'end_date'=>11/07/2020, */
            'description'=>'ofdasdsafsda',//DESCRIPCION GENERAL  DEL PROYECTO.
            'coordinator_name'=>'OLIVER',
            'coordinator_lastname'=>'NESTLES',
            'coordinator_postition'=>'POSITION',
            'coordinator_funtion'=>'coordinator',
            'introduction'=>'AFDSFDSDDSAFASSD',
            'situational_analysis'=>'AASDSDDSAAFDSSAF',//ANALISIS SITUACIONAL (DIAGNOSTICO)
            'foundamentation'=>'SADADASD',
            'justification'=>"ADSSDFDSF",
            //'bibliografia'=>"SE PONE LA BIBLIOGRAFIA",
            ]);
            
    }
    /* 
    {
	"ruc": "1234567891",
    "name_institution": "FUNDACION VISTA PARA TODOS",
    "location_id": 1,
    "indirect_beneficiaries": ["jesus","pepe","marcos"],
    "legal_representative_name": "RODRIGO",
    "legal_representative_lastname": "nogales",
    "legal_representative_identification": "1725485277",
    "project_post_charge": "PRESIDENTE",
    "direct_beneficiaries": ["alfredo","marcos","mario"],
    "charitable_institution_id": 1,
    "career_id": 1,
    "assigned_line_id": 45,
    "code": "yavirac1223",
    "project_name": "Systema ayuda a los pobres",
    "status_id": 1,
    "field": "campo",
    "aim": "objeto",
    "fraquency_id": 41,
    "cycle": ["primero","segundo","tercero"],
    "location_project": 1,
    "lead_time": 3,
    "delivery_date": "2018/1/22",
    "start_date": "2018/1/22",
    "end_date": "2018/1/22",
    "description": "ofdasdsafsda",
    "coordinator_name": "OLIVER",
    "coordinator_lastname": "NESTLES",
    "coordinator_postition": "POSITION",
    "coordinator_funtion": "coordinator",
    "introduction": "AFDSFDSDDSAFASSD",
    "situational_analysis": "AASDSDDSAAFDSSAF",
    "foundamentation": "SADADASD",
    "justification": "ADSSDFDSF",
    "bibliografia": ["bibliografia","noce que poner"]
 }       
*/
}
