<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use App\Categories;
use App\Companies;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Response;

class SearchController extends Controller
{

    public function index()
    {
    	$input = request()->all();
    	$job = Jobs::all();
    	foreach ($input as $key => $val) 
    	{
            if($key == 'category')
            {
                $key = 'category_id';
                $job = $job->where($key, $val);
            }
            if($key == 'salary') $job = $job->where($key, '>=', $val);
            if($key == 'title')
                $job = $job->where($key, $val);
            if($key == 'city')
                $job = $job->where($key, $val);
    	}

        $category = Categories::all();

    	return view('search.page', compact('job', 'category', 'jobs'));
    }

    public function category_all($id)
    {
        $jobs = Jobs::paginate(10);
        $category=Categories::find($id);
        $key = 'category_id';
        $job = $jobs->where($key, $id);
        return view('mycompany.category.all', compact('job', 'category'));
    }

    public function company_all()
    {
        $companies=Companies::all();
        return view('mycompany.all', compact('companies'));
    }
    public function all()
    {
        $input = request()->all();
            $job = Jobs::all();

            foreach ($input as $key => $val) 
            {
                if($key == 'category')
                {
                    $key = 'category_id';
                    $job = $job->where($key, $val);
                }
                if($key == 'salary') $job = $job->where($key, '>=', $val);
                if($key == 'title')
                {
                    $job = $job->where($key, $val);
                }
            }

            $category = Categories::all();

            return view('mycompany.job.all', compact('job', 'category'));
    }
    public function save($id)
    {
        $save = new \App\Save;

        $save->jobs_id = $id;
        $save->user_id = auth()->user()->id;

        $save->save();

        return back();
    }

    public function unsave($id)
    {
        $save = \App\Save::where('jobs_id', $id)->where('user_id', auth()->user()->id);
        $save->delete();

        return back();
    }

    public function autocomplete()
    {
        $term = Input::get('term');
        
        $results = array();
        
        // this will query the users table matching the first name or last name.
        // modify this accordingly as per your requirements
        
        $queries = DB::table('jobs')
            ->where('title', 'LIKE', '%'.$term.'%')
            ->take(5)->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->title];
        }
        return Response::json($results);
        
        // return view('search.page',compact('job'));
    }
}
