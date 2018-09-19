<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\User;
use App\Jobs;
use Redirect;
use Image;

class AdminCompaniesController extends Controller
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
        $companies = Companies::all();
        return view('admin.companies.companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all()->sortBy('lastname');
        return view('admin.companies.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::find($request->user_id);
        if(count($user->company))
        {
            // $message='This User Already Have Company';
            // return Redirect::back()->withErrors($message);
            $request->session()->flash('danger', 'User already have company');
            return redirect()->route('admin-companies.create');
        }
        $company=new Companies;
        $company->user_id=$request->user_id;
        $company->name=$request->name;
        $company->phonenumber=$request->phonenumber;
        $company->email=$request->email;
        $company->address=$request->address;
        $company->bio=$request->bio;
        $company->motto=$request->motto;
        $company->save();
        return redirect('/admin-companies');
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
        $company=Companies::find($id);
        $users=User::all();
        return view('admin.companies.edit', compact('users','company'));
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
        $company=Companies::find($id);
        $company->user_id=$request->user_id;
        $company->name=$request->name;
        $company->phonenumber=$request->phonenumber;
        $company->email=$request->email;
        $company->address=$request->address;
        $company->bio=$request->bio;
        $company->motto=$request->motto;
        $company->save();
        return redirect('/admin-companies');
    }
    public function update_profile(Request $request, $id)
    {
        $company=Companies::find($id);
        if($request->hasFile('avatar')){
            $temp_path = $company->photo_path;
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(272,272)->save(public_path('/uploads/avatars/companies/' . $filename));
            if($temp_path!='default.jpg')
            {
                $path = public_path() . "/uploads/avatars/companies/" . $company->photo_path;
                File::delete($path);    
            }
            $company->photo_path= $filename;
            $company->save();
            return redirect('/admin-companies');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Companies::find($id);
        if($company->job->count())
        {
            $jobs=Jobs::all();
            foreach($jobs as $job)
            {
                $job->delete();
            }
        }
        $company->delete();
        return redirect('/admin-companies');
    }
}
