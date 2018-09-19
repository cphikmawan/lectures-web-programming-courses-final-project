<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\User;
use App\Save;
use Auth;

class SavesController extends Controller
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
    
    public function index()
    {
        $saves = Save::all();
        $saved = $saves->where('user_id', Auth::user()->id);
        return view('myaccount.saved', compact('saved'));
    }

    public function destroy($id)
    {
        $save = \App\Save::where('jobs_id', $id)->where('user_id', auth()->user()->id);
        $save->delete();

        return back();
    }

}
