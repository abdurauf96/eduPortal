<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Course;
use Auth;
class SchoolController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function register()
    {

    	$regions=\App\Region::all();
    	$categories=\App\CategoryCourse::all();
    	return view('schools.register', compact('regions', 'categories'));
    }


    public function saveSchool()
    {	
    	
    	$user=School::where('user_id', request('user_id'))->first();
    	
    	if (!$user) {
    		
	    	request()->validate([
	    		'name'=>'required',
	    		'description'=>'required',
	    		'region'=>'required',
	    		'district'=>'required',
	    		'addres'=>'required',
	    		'phone'=>'required',
	    		'email'=>'required|email',
	    		'image'=>'required|mimes:jpg,png,jpeg'
	    	]);	

	    	if (request()->hasFile('image')) {
	    		$image=request('image');
	    		$img_name=time().'.'.$image->getClientOriginalExtension();
	    		$path="images/";
	    		$image->move($path, $img_name);

	    	}
	    	$courses=array_values(request('courses'));

	    	$school=new School();
	    	$school->name=request('name');
	    	$school->user_id=request('user_id');
	    	$school->description=request('description');
	    	$school->region_id=request('region');
	    	$school->district_id=request('district');
	    	$school->addres=request('addres');
	    	$school->phone=request('phone');
	    	$school->email=request('email');
	    	$school->site=request('site');
	    	$school->image="/images/".$img_name;
	    	$school->channel=request('channel');
	    	$school->save();

	    	$school->courses()->attach($courses);

	    	return view('home', compact('school'));

    	}else
    	{
    		return back()->with('error', 'Вы зарегистрировали свой учебный центр!');
    	}
    	
    }

    public function schoolEdit(School $school)
    {
    	if (request()->isMethod('post')) {
    		
    		if (request()->hasFile('new_image')) {
    			$image=request('new_image');
	    		$img_name=time().'.'.$image->getClientOriginalExtension();
	    		$path="images/";
	    		$image->move($path, $img_name);
	    		$school->image="/images/".$img_name;
    		}

    		$courses=array_values(request('courses'));
    		$school->name=request('name');
    		$school->description=request('description');
    		$school->region_id=request('region');
    		$school->district_id=request('district');
    		$school->addres=request('addres');
    		$school->phone=request('phone');
    		$school->email=request('email');
    		$school->site=request('site');
    		$school->channel=request('channel');
    		$school->update();
    		$school->courses()->sync($courses);
    		return redirect('/home');
    	}else{
    		$courses=Course::all();
    		$regions=\App\Region::all();
    		return view('schools.edit', compact('school', 'courses', 'regions'));
    	}
    }

    public function posts()
    {
        $posts=\App\Post::where('user_id', Auth::user()->id)->get();
        return view('schools.posts', compact('posts'));
    }

    public function createPost(Request $request)
    {
        if(request()->isMethod('post')){
            $post=new \App\Post();
            if ($request->hasFile('image')) {
                $image=$request->image;
                $path='files/images/';
                $img_name=time().'.'.$image->getClientOriginalExtension();
                $post->image='/files/images/'.$img_name;
                $image->move($path, $img_name);
            }
            $post->title_uz=$request->title_uz;
            $post->title_ru=$request->title_ru;
            $post->title_en=$request->title_en;
            $post->desc_uz=$request->desc_uz;
            $post->desc_ru=$request->desc_ru;
            $post->desc_en=$request->desc_en;
            $post->body_en=$request->body_en;
            $post->body_ru=$request->body_ru;
            $post->body_uz=$request->body_uz;
			$post->user_id=Auth::user()->id;
			$post->abiturient=$request->abi;
            $post->save();
            return redirect()->route('userPosts')->with('flash', 'статья успешно добавлена');
        }else{
            return view('schools.createPost');
        }
    }

}
