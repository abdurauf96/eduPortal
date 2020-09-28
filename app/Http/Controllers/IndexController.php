<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	$regions=\App\Region::orderBy('name_uz', 'asc')->get();
    	$districts=\App\District::all();
    	//$schools=\App\School::all();
        $cat_courses=\App\CategoryCourse::all();
        $top_schools=\App\School::where('status', 'top')->with('region')->get();
        $top_books=\App\Book::where('status', 'top')->with('category')->limit(3)->get();
        $thoughts=\App\Thought::orderBy('order')->get();
    	return view('welcome', compact('regions', 'districts', 'top_schools', 'cat_courses','top_books','thoughts'));
    }

    public function userRegistration(\App\School $school)
    {
        
    	return view('register', compact('school'));
    }

    public function saveUserRegistration()
    {   
        $courses=array_values(request('courses'));
        $students=\App\Student::where('phone', request('phone'))->get();
        $res=[];
        if (count($students)>0) {
            foreach ($students as $student) {
                foreach ($student->courses as $course) {
                    if (in_array($course->id, $courses)) {
                        //return redirect('/')->with('flash', 'royhatdan otgansz');
                        array_push($res, '1');
                    }
                }
            }
            if (count($res)>1) {
                return back()->with('error', 'вы уже зарегистрированы на этот курс');
            }else{
                $student=new \App\Student();
                $student->school_id=request('school_id');
                $student->name=request('name');
                $student->surname=request('surname');
                $student->phone=request('phone');
                $student->age=request('age');
                $student->time=request('time');
                $student->save();
                $student->courses()->attach($courses);
                return back()->with('flash', 'Вы успешно записались на этот курс');
            }
        }else{
            $student=new \App\Student();
            $student->school_id=request('school_id');
            $student->name=request('name');
            $student->surname=request('surname');
            $student->phone=request('phone');
            $student->age=request('age');
            $student->time=request('time');
            $student->save();
            $student->courses()->attach($courses);

            $school=\App\School::findOrFail(request('school_id'));

            $phone=new \App\Phone();
            $phone->phone=request('phone');
            $phone->region=$school->region->name_uz;
            $phone->save();
            return back()->with('flash', 'Вы успешно записались на этот курс');
        }   
    }
}
