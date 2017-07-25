<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel;
use Session;
use Validator;

class TravelWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         *  "_token" => "DlI9JCf42M9yhPHgvr2Hjr8iBEkmuJr1xDObwygc"
  "id" => null
  "project_id" => "20"
  "subproject_id" => "22"
  "nombre" => "2222"
  "descripcion" => "22222222222222"
  "activo" => "1"
  "business_id" => "4ea72fcf-f158-4fc5-aa1b-aebd04a2c9f1"
  "user_id" => "af342f96-9425-44c2-bdde-78b9d00b131e"*/
        $data = [];
        $data += $request->all();
        $data['business_id'] = Session::get('business_id');
        $data['user_id'] = Session::get('user_id');

        $val =Validator::make($data,
            [
                'nombre'        =>  'required|min:2|max:150|alpha_num_spaces|string_exist:travels,name',
                'descripcion'   =>  'required|min:2|max:150|alpha_num_spaces',
                'project_id'    =>  'required|integer',
                'subproject_id' =>  'required|integer',
                'business_id'   =>  'required',
                'user_id'       =>  'required',
                'activo'        =>  'required'
            ]);
        if($val->fails()){
            return  response()->json($val->errors());
        }
        $data = Travel::create([
            'name'          =>  $data['nombre'],
            'description'   =>  $data['descripcion'],
            'project_id'    =>  $data['project_id'],
            'sub_project_id'=>  $data['subproject_id'],
            'short_name'    =>  '123456',
            'business_id'   =>  $data['business_id'],
            'user_id'       =>  $data['user_id']
        ]);

        return response()->json(['success' => true ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travel = Travel::find($id);
        $dataUser = ServiciosController::getProfile($travel->user_id);
        $array= [
            'travel'        =>  $travel,
            'project'       =>  $travel->project,
            'subproject'    =>  $travel->subproject,
            'user'          =>  $dataUser
        ];
        return response()->json($array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
