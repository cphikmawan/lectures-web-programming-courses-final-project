<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Companies;
use App\Jobs;
use Auth;
use Validator;
use Image;
use File;

class CompaniesController extends Controller
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
        return view('mycompany.home',compact('jobs'));
    }

    public function index2()
    {
    	if(Auth::user()->company()->count())
    	{
    		return redirect('/company');
    	}
        return view('myaccount.create');
    }

    public function update_profile(Request $request)
    {
        if($request->hasFile('avatar')){
            $temp_path=Auth::user()->company->photo_path;
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(272,272)->save(public_path('/uploads/avatars/companies/' . $filename));
            $company = Auth::user()->company;
            if($temp_path!='default.jpg')
            {
                $path = public_path() . "/uploads/avatars/companies/" . $company->photo_path;
                File::delete($path);    
            }
            $company->photo_path= $filename;
            $company->save();

            return redirect('/company');
        }
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
    public function create_company()
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
        //
    }
    public function store_create_company(Request $request)
    {
    	$user= Auth::user();
         $this->validate($request,[
            'name'=>'required|max:255',
            'address' => 'required|string',
            'email'=> 'required|unique:companies'        
        ]);


        $company= new Companies;
        $company->user_id=$user->id;
        $company->name=$request->name;
        $company->phonenumber=$request->phonenumber;
        $company->address=$request->address;
        $company->email=$request->email;
       	$company->bio=$request->bio;
       	$company->motto=$request->motto;
       	$company->save();
        return redirect('/company');
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
        $company= Companies::find($id);
         $validator = Validator::make($request->all(), [
         	'name' => 'required|max:255',
            'phonenumber' => 'required|string|max:255',
            'address' => 'string|max:255',
            'email' => 'string|max:255',
            'bio' => 'string|max:255',
            'motto' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } 
        else {
        	$company->name=$request->name;
            $company->phonenumber=$request->phonenumber;
            $company->address=$request->address;
            $company->bio=$request->bio;
            $company->email=$request->email;
            $company->motto=$request->motto;
            $company->save();
            return redirect('/company');
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
        //
    }
}
