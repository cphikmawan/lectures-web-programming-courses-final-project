<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use Image;
use File;
class AccountHomeController extends Controller
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
        return view('myaccount.home');
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
        $user        = User::find($id);

        $validator = Validator::make($request->all(), [
            'phonenumber' => 'required|string|max:255',
            'address' => 'string|max:255',
            'bio' => 'string|max:255',
            'motto' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } 
        else {
            $user->phonenumber=$request->phonenumber;
            $user->address=$request->address;
            $user->bio=$request->bio;
            $user->motto=$request->motto;
            $user->save();
            return redirect('/account-home');
        }


        
    }
    public function updatepass(Request $request, $id)
    {
        $user       = User::find($id);
        $validator  = Validator::make($request->all(), [
            'password'  => 'present|confirmed|min:6'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } 
        else {
            $user->password=bcrypt($request->password);
            $user->save();
            return redirect('/account-home');
        }
    }

    public function update_profile(Request $request)
    {
        if($request->hasFile('avatar')){
            $temp_path=Auth::user()->photo_path;
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            if($temp_path!='default.jpg')
            {
                $path = public_path() . "/uploads/avatars/" . $user->photo_path;
                File::delete($path);
            }
            $user->photo_path= $filename;
            $user->save();

            return redirect('/account-home');
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
        $user=User::find($id);
        $user->delete();
        return redirect('/');
    }
    public function close()
    {
        return view('myaccount.close');
    }
    public function create_company(Request $request, $id)
    {
        return redirect('/account-home');
    }
}
