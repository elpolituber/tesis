<?php

namespace App\Http\Controllers\proyectovinculacion;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vinculacion\Project;
use App\Models\Vinculacion\CharitableInstitution;
use App\Models\Vinculacion\SpecificAim;
use App\Models\Vinculacion\AcademiPeriod;
use App\Models\Career;
use App\Models\Catalogue;
use App\Models\Vinculacion\LinkageAxes;
use App\Models\Image;
use App\Models\File;




class projectsController extends Controller
{
  public function show(){
    $char=Project::join('charitable_institutions','projects.charitable_institution_id','=','charitable_institutions.id')
    ->get([
      'projects.id',
      'charitable_institutions.name as name_institution',
      'charitable_institutions.ruc',
      //'charitable_institution.location_id as location_institution',
      'indirect_beneficiaries',
      'legal_representative_name',
      'legal_representative_lastname',
      'legal_representative_identification',
      'project_post_charge',
      'direct_beneficiaries',
      'career_id',
      'code as code_project',
      'projects.name as projects_name',
      'field',
      'aim',
      'cycle',
      'lead_time',
      'delivery_date',
      'start_date',
      'description',
      'coordinator_name',
      'coordinator_lastname',
      'coordinator_postition',
      'coordinator_funtion',
      'introduction',
      'situational_analysis',
      'foundamentation',
      'justification',
      'bibliografia',
      //'schedules'
      //'location_id,name as licalitation',
      //'fraquency_id.name as fraquency_id_name'
      //'status_id.name as status_name',
      //'assigned_line_id.name as assigned_line_id'
      //
    ]);
    
    return $char;
 }

 public function create(Request $request){
  //img and file
 /*  $Image=new Image;
  $Image->logo=$request->logo;
  $File=new File;
  $File->COMPANYATTACHEDFILES=$request->COMPANYATTACHEDFILES;
  $File->schedules=$request->schedules;//cronograma */
  //fk image and file

  //CharatableInstitution
   $CharitableInstitution= new CharitableInstitution; 
   $CharitableInstitution->state_id=1;
   $CharitableInstitution->ruc=$request->ruc;
   $CharitableInstitution->name=$request->company_name;
   $CharitableInstitution->location_id=$request->location_id;
   $CharitableInstitution->indirect_beneficiaries=$request->indirect_beneficiaries;
   $CharitableInstitution->legal_representative_name=$request->legal_representative_name;
   $CharitableInstitution->legal_representative_lastname=$request->legal_representative_lastname;
   $CharitableInstitution->legal_representative_identification=$request->legal_representative_identification;
   $CharitableInstitution->project_post_charge=$request->project_post_charge;
   $CharitableInstitution->direct_beneficiaries=$request->direct_beneficiaries;
   $CharitableInstitution->save();
   //fk Search
   $fkCharitableInstitution=CharitableInstitution::where('ruc', $request->ruc)->first();
   //project    
   $Project=new Project;
   $Project->charitable_institution_id=$fkCharitableInstitution->id;                 
  // $Project->academi_period_id=$fkacademiPreriod->id;
   $Project->career_id=$request->career_id;
   $Project->assigned_line_id=$request->$request->assigned_line_id;
   $Project->code=$request->$request->code;
   $Project->name=$request->project_name;
   $Project->status_id= $request->status_id;
   $Project->state_id=1;
   $Project->field=$request->field;
   $Project->aim=$request->aim;
   $Project->fraquency_id=$request->fraquency_id;
   $Project->cycle=$request->cycle;
   $Project->location_id=$request->location_id_project; //catalogues');
   $Project->lead_time=$request->lead_time;
   $Project->delivery_date=$request->delivery_date;// tiempo
   $Project->start_date=$request->start_date;// tiempo
   $Project->end_date=$request->end_date;//tienmpo
   $Project->description=$request->description;
   $Project->coordinator_name=$request->coordinator_name;
   $Project->coordinator_lastname=$request->coordinator_lastname;
   $Project->coordinator_postition=$request->coordinator_postition;
   $Project->coordinator_funtion=$request->coordinator_funtion;
   $Project->introduction=$request->introduction;
   $Project->situational_analysis=$request->situational_analysis;
   $Project->foundamentation=$request->foundamentation;
   $Project->justification=$request->justification;
   $Project->bibliografia=$request->bibliografia;
   $Project->save();
  //cronograma
   
   //fk Project searh
  /*  $fkProject=Project::where('codeAgreement',$request->codeAgreement)->first();
   $fkaims_types=Catalogue::where('aims_types',$request->aims_types)->firts(); */
   //SpecificAim
   /* $SpecificAim = new SpecificAim; 
   $SpecificAim->project_id=$fkProject->id;
   $SpecificAim->name=$request->name;
   $SpecificAim->indicator=$request->indicator;
   $SpecificAim->trackingMeans=$request->trackingMeans;
   $SpecificAim->aims_types=$fkaims_types->id;//('catalogues');
   $SpecificAim->result=$request->result;
   $SpecificAim->activities=$request->activities;
   $SpecificAim-> save(); */

  return Project::all();
}

}