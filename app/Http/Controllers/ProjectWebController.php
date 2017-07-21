<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SubProject;
use App\Travel;
use Session;
use Validator;
use App\Http\Controllers\ServiciosController;
use Log;

class ProjectWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array= [];
        $data = Project::orderBy('id', 'desc')->get();


        $i=0;
        foreach ($data as $dat) {
            $array[$i]['project']['id'] = $dat['id'];
            $array[$i]['project']['name'] = $dat['name'];
                $dataSub = SubProject::where('project_id',$dat['id'])->get();
                $i2=0;
                $array[$i]['subproject'] = [];
                $array[$i]['travel'] = [];
                foreach ($dataSub as $dats){
                    $array[$i]['subproject'][$i2]['id'] = $dats['id'];
                    $array[$i]['subproject'][$i2]['name'] = $dats['name'];
                        $travel = Travel::where('sub_project_id',$dats['id'])->get();
                            $i3=0;
                            foreach($travel as $datr){
                                $array[$i]['travel'][$i3]['id'] = $datr['id'];
                                $array[$i]['travel'][$i3]['name'] = $datr['name'];
                                $i3++;
                            }
                    $i2++;
                }
            $i++;
        }

        //dd($array);
        return view('project',['data' => $array]);
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
        //dd(Session::all());
        //dd($request->all());
        $data = [];
        $data += $request->all();
        $data['business_id'] = Session::get('business_id');
        $data['user_id'] = Session::get('user_id');

        $val =Validator::make($data,
            [
                'nombre'          => 'required|min:2|max:150|alpha_num_spaces|string_exist:projects,name',
                'descripcion'   => 'required|min:2|max:150|alpha_num_spaces',
                'business_id'   => 'required',
                'user_id'       => 'required',
            ]);
        if($val->fails()){
            return  response()->json($val->errors());
        }

        $data= Project::create([
            'name'          => $data['nombre'],
            'description'   => $data['descripcion'],
            'business_id'   => $data['business_id'],
            'user_id'       => $data['user_id']
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $dataUser = ServiciosController::getProfile($project->user_id);

        $array= [
            'project' =>$project,
            'user'    =>$dataUser
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
