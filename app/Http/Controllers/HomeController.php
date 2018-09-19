<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Jobs;
use App\Categories;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
    	// $jobs=Jobs::all();
        $jobs=Jobs::all()->sortByDesc("id");;
    	$companies=Companies::all();
    	return view('myhomepage.home',compact('companies','jobs','categories'));
    }
    
    public function show($id)
    {
        $job=Jobs::find($id);
        return view('mycompany.job.detail',compact('job'));
    }

    public function aboutus()
    {
        return view('myhomepage.about');
    }
}
