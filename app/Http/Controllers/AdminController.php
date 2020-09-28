<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use App\Region;
use App\District;
use App\Course;
use App\School;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function schools()
    {
        $schools=School::with(['region', 'user'])->get();
        return view('admin.schools', compact('schools'));
    }

    public function regions()
    {	
    	$regions=Region::all();

    	return view('admin.regions', compact('regions'));
    }

    public function addRegion()
    {
    	return view('admin.addRegion');
    }

    public function saveRegion()
    {
    	$region=new Region();
    	$region->name_uz=request('name_uz');
        $region->name_ru=request('name_ru');
        $region->name_en=request('name_en');

    	$region->save();

    	return redirect()->route('regions')->with('flash', 'Viloyat qo`shildi');
    }

    public function districts()
    {
    	$districts=District::with('region')->get();

    	return view('admin.districts', compact('districts'));
    }

    public function addDistrict()
    {
    	if (request()->isMethod('post')) {
    		$district=new District();
    		$district->name_uz=request('name_uz');
            $district->name_en=request('name_en');
            $district->name_ru=request('name_ru');
    		$district->region_id=request('region_id');
    		$district->save();
    		return redirect()->route('districts')->with('flash', 'Tuman qo`shildi');
    	}else{
    		$regions=Region::all();
    		return view('admin.addDistrict', compact('regions'));
    	}
    	
    }

    public function courseCategories()
    {
        if (request()->isMethod('post')) {
            $cat=new \App\CategoryCourse();
            $cat->name_uz=request('name_uz');
            $cat->name_ru=request('name_ru');
            $cat->name_en=request('name_en');
            $cat->save();
            return back()->with('flash', 'category added successfully');
        }else{
            $categories=\App\CategoryCourse::all();
            return view('admin.courses.categories', compact('categories'));
        }
    }

    public function deleteCourseCategory(CategoryCourse $category)
    {
        $category->delete();
        return back()->with('flash', 'category deleted successfully');
    }

    public function courses()
    {
        if (request()->isMethod('post')) {
            $course=new Course();
            $course->name_uz=request('name_uz');
            $course->name_ru=request('name_ru');
            $course->name_en=request('name_en');
            $course->category_id=request('category_id');
            $course->save();
            return back()->with('flash', 'Kurs kiritildi');
        }else{
            $courses=Course::latest()->get();
            $categories=\App\CategoryCourse::all();
            return view('admin.courses.courses', compact('courses', 'categories'));
        }
    }

    public function deleteCourse(Course $course)
    {
        $course->delete();
        return back()->with('flash', 'Course deleted successfullly');
    }

    public function editCourse(Course $course)
    {
        $categories=\App\CategoryCourse::all();
        return view('admin.courses.editCourse', compact('course', 'categories'));
    }

    public function updateCourse(Course $course)
    {
        $course->name_uz=request('name_uz');
        $course->name_ru=request('name_ru');
        $course->name_en=request('name_en');
        $course->category_id=request('category_id');
        $course->update();
        return redirect()->route('courses')->with('flash', 'course updated successfully');
    }

    public function editSchool(School $school)
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
            $school->status=request('status');
            $school->update();
            $school->courses()->sync($courses);
            return redirect('admin/schools')->with('flash', 'updated successfully');
        }else{
            $regions=Region::all();
            $districts=District::where('region_id', $school->region_id)->get();
            $courses=Course::all();
            //$school=School::findOrFail(request('id'));
            return view('admin.editSchool', compact('school', 'regions', 'districts', 'courses'));
        }
    }

    public function books()
    {
        if (request()->isMethod('post')) {

            $path="files/books/";
            if (request()->hasFile('image')) {
                $image=request('image');
                $img_name=$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
                $image->move($path, $img_name);
            }else{
                $img_name='';
            }

            $book=request('book');
            $book_name=$book->getClientOriginalName().'.'.$book->getClientOriginalExtension();
            $book->move($path, $book_name);
            $book=new \App\Book();
            $book->name=request('name');
            $book->category_id=request('category_id');
            $book->status=request('status');
            $book->image="/files/books/".$img_name;
            $book->book="/files/books/".$book_name;
            $book->save();
            return back()->with('flash', 'Book added successfully');
        }else{
            $books=\App\Book::with('category')->latest()->paginate(10);
            $categories=\App\Category::all();
            return view('admin.books', compact('categories', 'books'));
        }
    }

    public function deleteBook(\App\Book $book)
    {
        $book->delete();
        return back()->with('flash', 'Book deleted successfully');
    }

    public function categories()
    {
        if (request()->isMethod('post')) {
            $category=new \App\Category();
            $category->name_uz=request('name_uz');
            $category->name_ru=request('name_ru');
            $category->name_en=request('name_en');
            $category->save();
            return back()->with('flash', 'category added successfully');
        }else{
            $categories=\App\Category::all();
            return view('admin.categories', compact('categories'));
        }
    }

    public function deleteCategory(\App\Category $category)
    {
        $category->delete();
        return back()->with('flash', 'Category deleted successfully');
    }

    public function messages($id=null)
    {
        if ($id) {
            $message=\App\Message::findOrFail($id);
            $message->delete();
            return back();
        }else{
            $messages=\App\Message::all();
            return view('admin.messages', compact('messages'));
        }   
        
    }
}
