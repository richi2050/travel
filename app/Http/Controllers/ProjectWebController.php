<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\SubProject;
use App\Travel;

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
        $data = Project::all();


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
        $val =Validator::make($request->all(),
            [
                'name'          => 'required|min:2|max:150|alpha_num_spaces|string_exist:projects,name',
                'description'   => 'required|min:2|max:150|alpha_num_spaces',
                'business_id'   => 'required|integer'
            ]);
        if($val->fails()){
            return  response()->json($val->errors());
        }

        $data= Project::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'business_id'   => $request->business_id
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

        return response()->json($project);
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
