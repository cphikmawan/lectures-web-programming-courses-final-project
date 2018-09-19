<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Jobs;
use Auth;

class JobsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Jobs::all();
        $val=Auth::user()->company->id;
        $key='company_id';

        $jobs=$jobs->where($key, $val);


        return view('mycompany.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->company()->count())
        {
            $categories = Categories::all();
            return view('mycompany.job.create', compact('categories'));
        }
        else
        {
            return redirect('/create-company');
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
        // validate
        $company= Auth::user()->company;
         $this->validate($request,[
            'title'=>'required|max:255'        
        ]);
        $job= new Jobs;
        $job->company_id=$company->id;
        $job->category_id=$request->category_id;
        $job->title=$request->title;
        $job->desc=$request->desc;
        $job->position=$request->position;
        $job->city=$request->city;
        $job->salary=$request->salary;
        $job->save();
        return redirect('/job');
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
        $categories=Categories::all();
        $jobb=Jobs::find($id);
        return view('mycompany.job.edit',compact('jobb','categories'));
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