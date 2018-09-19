<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\Companies;
use App\Categories;

class AdminJobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Jobs::all();
        return view('admin.jobs.jobs', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Companies::all();
        $categories=Categories::all();
        return view('admin.jobs.create',compact('companies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company= Companies::find($request->company_id);
        $job= new Jobs;
        $job->company_id=$request->company_id;
        $job->category_id=$request->category_id;
        $job->title=$request->title;
        $job->desc=$request->desc;
        $job->position=$request->position;
        $job->city=$request->city;
        $job->salary=$request->salary;
        $job->save();
        return redirect('/admin-jobs');
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
        $job=Jobs::find($id);
        $companies=Companies::all();
        $categories=Categories::all();
        return view('admin.jobs.edit',compact('companies','categories','job'));
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
        $job=Jobs::find($id);
        $job->company_id=$request->company_id;
        $job->category_id=$request->category_id;
        $job->title=$request->title;
        $job->desc=$request->desc;
        $job->position=$request->position;
        $job->city=$request->city;
        $job->salary=$request->salary;
        $job->save();
        return redirect('/admin-jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=Jobs::find($id);
        $job->delete();
        return redirect('/admin-jobs');
    }
}
