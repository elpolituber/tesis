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
        DB::table('locations')->insert([
            'code'=> '100',
            'name'=> "500",
            'type'=> "200",
            'principal_street'=>'CASA',
            'secondary_street'=>"NO CASA",
            'state_id'=>1,
            ]);

        DB::table('charitable_institutions')->insert([    
            'state_id'=>1,
            'ruc'=>'1234567891',
            'name'=>"FUNDACION VISTA PARA TODOS",
            'location_id'=>1, //fk propia
           // 'indirect_beneficiaries'=> json_encode([ 'bio' => "LOS CIEGOS"]),
            'legal_representative_name'=>"RODRIGO",
            'legal_representative_lastname'=>"nogales",
            'legal_representative_identification'=>1725485277,
            'project_post_charge'=>"PRESIDENTE",//CARGO
           // 'direct_beneficiaries'=>"VISTA PARA TODOS",
            ]);
        
            DB::table('projects')->insert([  
            'charitable_institution_id'=>1,                 
            'career_id'=>1,
            'assigned_line_id'=>1,//pendiente//lineas de investigacion
            'code'=>'yavirac1223',
            'name'=>'Systema ayuda a los pobres',
            'status_id'=>1,//catalogo propio una fk 
            'state_id'=>1,
            'field'=>"campo",//campo de area de vinculacion
            'aim'=>'objeto',//objeto
            'fraquency_id'=>1,//frecuencia de actividades
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
                "logo":"logo",el envio base64
                "ruc":"ruc",
                "companyName":"companyName",
                "address":"address",
                "city":"city",
                "province":"province",
                "indirectBeneficiary":"indirectBeneficiary",
                "legalRepresentativeName":"legalRepresentativeName",
                "legalRepresentativeLastName":"legalRepresentativeLastName",
                "legalRepresentativeID":"legalRepresentativeID",
                "projectPostInCharge":"projectPostInCharge",
                "paeish":"paeish",
                "coordinatorName":"coordinatorName",
                "coordinatorLastName":"coordinatorLastName",
                "coordinatorPost":"coordinatorPost",
                "directBeneficiary":"directBeneficiary",
                "COMPANYATTACHEDFILES":"COMPANYATTACHEDFILES"el envio base64
                "charitable_institution_id": 1,
                "academi_period_id": 1,
                "career_id": 1,
                "assigned_line_id": 1,
                "bonding_activitie_id": 1,
                "research_area_id": 1,
                "linkage_axe_id": 1,
                "codeAgreement": "abc123",
                "projectName": "$request->projectName",
                "state": "activo",
                "field": "field",
                "aim": "el objetivo general de otodo es..........",
                "fraquency_of_activities": 1,
                "cycle": "$request->cycle;",
                "leadTime": "$re",
                "deliveryDate": "2018-05-01",
                "startDate": "2018-05-01",
                "finishDate": "2018-05-01",
                "linkingProjectGeneralDescription": "$request->linkingProjectGeneralDescription",
                "introduction": "$request->introduction",
                "situationalAnalysis": "$request->situationalAnalysis",
                "foundation": "$request->foundation",
                "justification": "justification",
                "authorizedBy": "authorizedBy",
                "developeDBy": "developeDBy",
                "schedules": "cronograma",
             */
}
