<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Jobs;

class DetailsController extends Controller
{

    public function show($id)
    {
        $job=Jobs::find($id);
        return view('mycompany.job.detail',compact('job'));
    }
    public function show_company($id)
    {
        $jobs=Jobs::all();
        $key='company_id';

        $jobs=$jobs->where($key, $id);
        $company=Companies::find($id);
        return view('mycompany.profile',compact('company','jobs'));
    }

}
