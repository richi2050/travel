<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SubProject;
use App\Travel;

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

        $projects =  Project::all();
        $subproject = SubProject::all();
        $travel = Travel::all();


       /* $travel = Travel::find(2);
        dd($travel->subproject);*/
        //dd($travel);
        //dd($projects->user());
            //dd($subproject);
        return view('admin.project',['projects' => $projects,'subproject' => $subproject,'travel' => $travel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $pro = Project::find($request->id);

        if($pro){

            $pro->name          = $request->name;
            $pro->description   = $request->description;
            $pro->user_id       = $request->user_id;
            $pro->active        = $request->active;
            $pro->save();

        }else{
            Project::create([
                'name'          =>$request->name,
                'description'   =>$request->description,
                'user_id'       =>$request->user_id ,
                'active'        => $request->active
            ]);
        }


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
        //
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

    static function randon(){
        return 45;
    }
}
