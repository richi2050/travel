<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SubProject;
use App\Travel;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pro = Project::where('id',1)->toSql();
        //dd($pro->user->name);

        $projects =  Project::orderBy('id', 'desc')->get();
        //$subproject = SubProject::all();
        //$travel = Travel::all();
        $array =[];
        $i=0;

        foreach($projects as $pro){
            $array[$i]['proyectos']=[];
            $array[$i]['proyectos']['id'] =$pro->id;
            $array[$i]['proyectos']['name'] =$pro->name;
                $subproject = SubProject::where('project_id',$pro->id)->get();
            $i2 =0;
            $array[$i]['sub_proyectos']=[];
            $array[$i]['travel']=[];
                foreach ($subproject as $sub){
                    $array[$i]['sub_proyectos'][$i2]['id'] =$sub->id;
                    $array[$i]['sub_proyectos'][$i2]['name'] =$sub->name;
                        $travel = Travel::where('sub_project_id',$sub->id)->get();
                        $i3=0;
                        foreach($travel as $tra){
                            $array[$i]['travel'][$i3]['id'] =$tra->id;
                            $array[$i]['travel'][$i3]['name'] =$tra->travel_account;
                            $i3++;
                        }
                    $i2++;
                }
            $i++;
        }
        //dd($array);
        return view('admin.project',['projects' => $array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pro = Project::find($request->id);
        if($pro){
            $pro->name          = $request->nombre;
            $pro->description   = $request->descripcion;
            $pro->active        =  $request->activo;
            $pro->save();

        }else{
            Project::create([
                'name'          =>$request->nombre,
                'description'   =>$request->descripcion,
                'user_id'       =>Auth::user()->id ,
                'active'        => $request->activo
            ]);
        }
        return ['flag' => true];


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Project::find($id)->toArray();
        $datUse = Project::find($id);
        $data['use'] = $datUse->user->name;
        return $data;
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

    public function ListProject()
    {
        $projects =  Project::orderBy('id', 'desc')->get();
        $array =[];
        $i=0;
        foreach($projects as $pro){
            $array[$i]['proyectos']=[];
            $array[$i]['proyectos']['id'] =$pro->id;
            $array[$i]['proyectos']['name'] =$pro->name;
            $subproject = SubProject::where('project_id',$pro->id)->get();
            $i2 =0;
            $array[$i]['sub_proyectos']=[];
            $array[$i]['travel']=[];
            foreach ($subproject as $sub){
                $array[$i]['sub_proyectos'][$i2]['id'] =$sub->id;
                $array[$i]['sub_proyectos'][$i2]['name'] =$sub->name;
                $travel = Travel::where('sub_project_id',$sub->id)->get();
                $i3=0;
                foreach($travel as $tra){
                    $array[$i]['travel'][$i3]['id'] =$tra->id;
                    $array[$i]['travel'][$i3]['name'] =$tra->travel_account;
                    $i3++;
                }
                $i2++;
            }
            $i++;
        }
        return view('admin.project_list',['projects' => $array]);
    }
}
