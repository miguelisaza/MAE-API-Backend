<?php 

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
// use Illuminate\Support\Facades\Hash;
class ScheduleController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  protected $usuario;  
  protected static $days=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
  function __construct ( User $usuario){
    $this->usuario=$usuario;
   }
  public function index(Request $request){

   $usuarios = $this->usuario->filters($request->all())->get();
   $data = ["usuarios"=>$usuarios];
   return response()
      ->json(compact('data')); 

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function now(Request $request)
  {
    /*
      distinct
      e.ID ,e.NOMBRES,e.APELLIDOS,da.ID_DOCENTE,da.NOMBRES_DOCENTE,da.APELLIDOS_DOCENTE
      ,da.ASIGNATURA
      ,da.Lunes,da.Martes,da.Miercoles,da.Jueves,da.Viernes,da.Sabado
      ,cast(SUBSTRING(Viernes,1,LOCATE('-',Viernes)-1) as time )
      ,(addTime(cast(SUBSTRING(Viernes,1,LOCATE('-',Viernes)-1) as time ),'00:20'))
      from datos_academicos as da
      join estudiantes as e on e.id=da.id
      where ID_Docente like '%T00000021%'
      and cast(SUBSTRING(Viernes,1,LOCATE('-',Viernes)-1) as time ) 
      between '14:50' and (addTime('14:50','00:20'))
    */
    $day=ScheduleController::$days[Carbon::now()->dayOfWeek];
    $hour=Carbon::now()->hour.":".Carbon::now()->minute;
    
    $schedule=DB::connection("sirius")->table("datos_academicos as da")
    ->join("estudiantes as e","e.id","=","da.id")
    ->where("ID_Docente",DB::raw("'".\Auth::user()->getCode()."'" ))
    ->whereRaw(DB::raw("cast(SUBSTRING(".$day.",1,LOCATE('-',".$day.")-1) as time ) between '14:50' and (addTime('14:50','00:20'))"))
    ->select('e.ID' ,'e.NOMBRES','e.APELLIDOS','da.ID_DOCENTE','da.NOMBRES_DOCENTE'
            ,'da.APELLIDOS_DOCENTE','da.ASIGNATURA')
    ->distinct()->get();

     $data = ["schedule"=>$schedule,"day"=>$day,"hour"=>$hour];
    return response()
      ->json(compact('data'));  
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $usuarios=$this->usuario->findOrFail($id);
       $data = ["usuario"=>$usuarios];
       return response()
      ->json(compact('data'));
    }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UserRequest $request, $id)
  {
   
    $usuarios=$this->usuario->findOrFail($id);
    $usuarios= $usuarios->fill($request->all());
    $usuarios->password=Hash::make($usuarios->password);
    $usuarios->update();
    $data = ["usuario"=>$usuarios];
       return response()
      ->json(compact('data'));
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $usuarios=$this->usuario->findOrFail($id);
    $usuarios->delete();

  }
  
}

?>