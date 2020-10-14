<?php

namespace App\Http\Controllers\proyectovinculacion;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Catalogue as AttendanceCatalogue;
use Illuminate\Http\Request;
use App\Models\Vinculacion\Project;
use App\Models\Vinculacion\CharitableInstitution;
use App\Models\Vinculacion\SpecificAim;
use App\Models\Vinculacion\AcademiPeriod;
use App\Models\Career;
use App\Models\Ignug\Catalogue;
use App\Models\Vinculacion\LinkageAxes;
use App\Models\Image;
use App\Models\File;
use Mockery\Matcher\Type;

class projectsController extends Controller
{
  public function show(){
    $char=Project::join('vinculacion.charitable_institutions','projects.charitable_institution_id','=','charitable_institutions.id')
    ->join('ignug.careers','ignug.careers.id','=','vinculacion.projects.career_id')
    ->join('ignug.catalogues','ignug.careers.modality_id','=','ignug.catalogues.id')
    ->join('ignug.locations','charitable_institutions.location_id','locations.id')
    ->get([
      'projects.id as project_id',
      'charitable_institutions.name as name_institution',
      'charitable_institutions.ruc',
      "locations.id as location__id_charitable_institutions ",
      "locations.parent_code_id",
      "locations.code as location_code_charitable_institutions",
      "locations.name as location_name_charitable_institutions",
      "locations.type as location_type_charitable_institutions",
      "locations.principal_street",
      "locations.secondary_street",
      "locations.number as location_number_charitable_institutions",
      "locations.post_code as location_post_code_charitable_institutions",
      'indirect_beneficiaries',
      'legal_representative_name',
      'legal_representative_lastname',
      'legal_representative_identification',
      'project_post_charge',
      'direct_beneficiaries',
      'careers.id as careers_id',
      "careers.name as careers_name",
      "catalogues.name as modality",
      'projects.code as project_code',
      'projects.name as projects_name',
      'field',
      'aim',
      'cycle',
      'lead_time',
      'delivery_date',
      'start_date',
      'projects.description as description_project',
      'coordinator_name',
      'coordinator_lastname',
      'coordinator_postition',
      'coordinator_funtion',
      'introduction',
      'situational_analysis',
      'foundamentation',
      'justification',
      //'bibliografia',
      //'schedules'
     // 'location_id,name as licalitation',
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
   $CharitableInstitution->name=$request->name_institution;
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
   $Project->assigned_line_id=$request->assigned_line_id;
   $Project->code=$request->code;
   $Project->name=$request->project_name;
   $Project->status_id= $request->status_id;
   $Project->state_id=1;
   $Project->field=$request->field;
   $Project->aim=$request->aim;
   $Project->fraquency_id=$request->fraquency_id;
   $Project->cycle=$request->cycle;
   $Project->location_id=$request->location_project; //localitation'
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
  
   //fk Project searh
   $fkProject=Project::where('code',$request->code)->first("id");
   //SpecificAim
   $projectcontrol= new projectsController;
   
   for($con=0;$con<count($request->type_id);$con++){
    $fkaims=$request->parent_code_id[$con] <> null ? SpecificAim::where('description',$request->parent_code_id[$con])->first("id") : (object) array("id"=>null);
    $value=$projectcontrol->aimsCreate($fkProject->id,$request->type_id[$con],$request->descripcion[$con],$request->indicator[$con],$request->verifications[$con],$fkaims->id);  
   }
   return $value; 
  }


  public function aimsCreate($id_project,$type_id,$description,$indicator,array $verifications,$parent_code_id){
    $SpecificAim = new SpecificAim;
    $SpecificAim->state_id=1;
    $SpecificAim->project_id=$id_project;
    $SpecificAim->indicator=$indicator;
    $SpecificAim->verifications=$verifications;
    $SpecificAim->description=$description;
    $SpecificAim->type_id=$type_id;
    $SpecificAim->parent_code_id=$parent_code_id;
    $SpecificAim->save();
    return $verifications;
  }
  public function creador(Request $request){
    $vista=SpecificAim::all();
    return $vista;
  }
}