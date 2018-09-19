<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Companies;
use App\Jobs;
use Auth;
use Image;

class AdminUsersController extends Controller
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
        $users=User::all();
        return view('admin.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect('/admin-users');
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
        $user=User::find($id);
        return view('admin.users.edit', compact('user'));
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
        $user=User::find($id);
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->phonenumber=$request->phonenumber;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->bio=$request->bio;
        $user->motto=$request->motto;
        $user->permission=$request->permission;
        $user->save();
        return redirect('/admin-users');
    }
    public function update_profile(Request $request, $id)
    {
        $user=User::find($id);
        if($request->hasFile('avatar')){
            $temp_path=$user->photo_path;
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));

            if($temp_path!='default.jpg')
            {
                $path = public_path() . "/uploads/avatars/" . $user->photo_path;
                File::delete($path);
            }
            $user->photo_path= $filename;
            $user->save();

            return redirect('/admin-users');
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
        if($id == Auth::user()->id)
        {
            return redirect('/');
        }
        $user=User::find($id);
        if(count($user->company))
        {
            $company=Companies::find($user->company->id);
            if(count($company->job))
            {
                $jobs=Jobs::all();
                $jobs=$jobs->where('company_id', $company->id);
                foreach($jobs as $job)
                {
                    $job->delete();
                }
            }
            $company->delete();
        }
        $user->delete();

        return redirect('/admin-users');
    }

    public function autocompleteusers()
    {
        // $term = Input::get('term');
        
        // $results = array();
        
        // // this will query the users table matching the first name or last name.
        // // modify this accordingly as per your requirements
        
        // $queries = DB::table('users')
        //     ->where('firstname', 'LIKE', '%'.$term.'%')
        //     ->orWhere('lastname', 'LIKE', '%'.$term.'%')
        //     ->take(5)->get();
        
        // foreach ($queries as $query)
        // {
        //     $results[] = [ 'id' => $query->id, 'value' => $query->firstname.' '.$query->lastname ];
        // }
        // return Response::json($results);
        return redirect('/');
        // return view('search.page',compact('job'));
    }
}
