<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class QueryController extends Controller
{
    public function getDist()
    {
    	$id=request('id');
    	$districts=District::where('region_id', $id)->get();
    	$res=view('ajax.resDist', compact('districts'));
    	return $res;
    }

    public function getSchool()
    {
    	$id=request('id');
    	$region_id=request('region_id');
    	if ($id=='0') {
    		$schools=\App\School::where('region_id', $region_id)->get();
    	}else{
    		$schools=\App\School::where('district_id', $id)->get();
    	}
    	
    	$res=view('ajax.getSchool', compact('schools'));
    	return $res;
    }

    public function resSchool()
    {
    	$schools=\App\School::where('region_id', request('region_id'))->get();
    	$res=view('ajax.getSchool', compact('schools'));
    	
    	return  $res;
    }

    public function viewSchools()
    {
        $district_id=request('district_id');
        $region_id=request('region_id');
        $direction_id=request('direction_id');
        $schools=\App\School::when($district_id, function($query, $district_id){
            return $query->where('district_id', $district_id);
        })
        ->when($region_id, function($query, $region_id){
            return $query->where('region_id', $region_id);
        })
         ->when($direction_id, function($query, $direction_id){
            return $query->whereHas('courses', function($query) use ($direction_id){
                return $query->where('course_id', $direction_id);
            });
        })
        ->get();
        $res=view('ajax.schools_result', compact('schools'));
        return $res;
    }

    public function searchCourses()
    {
        $courses=\App\Course::where('category_id', request('cat_id'))->get();
        $res=view('ajax.resCourses', compact('courses'));
        return $res;
    }

    public function message()
    {
         $message=new \App\Message();
         $message->phone=request('phone');
         $message->save();
         return back()->with('flash', 'Мы свяжемся с вами в ближайшее время');
    }

    public function jobseeker()
    {
        if (request()->isMethod('post')) {
            $job=new \App\Jobseeker();
            if (request()->hasFile('resume')) {
                $resume=request('resume');
                $filename=$resume->getClientOriginalName();
                $resume->move('files/resumes/', $filename);
                $job->resume="/files/resumes/".$filename;
            }
            $job->fio=request('fio');
            $job->age=request('age');
            $job->addres=request('region');
            $job->info=request('info');
            $job->phone=request('phone');
            $job->jobname=request('prof');
            $job->save();
            return back()->with('flash', 'murojat qoldirildi!');
        }else{
            $seekers=\App\Jobseeker::latest()->paginate(10);
            return view('jobSeekers', compact('seekers'));
        }
        
    }

    public function getJobs()
    {
        if (request()->isMethod('post')) {
            $job=new \App\Vacancy();
            $job->idora=request('idora');
            $job->job_name=request('prof');
            $job->summa=request('summa');
            $job->phone=request('phone');
            $job->addres=request('region');
            $job->description=request('desc');
            $job->save();
            return back()->with('flash', 'success');
        }else{
            $jobs=\App\Vacancy::latest()->paginate(10);
            return view('vacancy', compact('jobs'));
        }
    }

    public function getUnivers()
    {
        
        $results=\App\Result::where('region_id', request('id'))->get();
        $res=view('ajax.res_univer', compact('results'));
        return $res;
    }
}
