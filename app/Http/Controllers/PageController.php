<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Post;

class PageController extends Controller
{
    public function viewSchool(School $school)
    {
       
    	return view('viewSchool', compact('school'));
    }

    public function about()
    {
    	return view('about');
    }

    public function books()
    {
        if (isset($_GET['sort'])) {
            if ($_GET['sort']=='asc') {
                $books=\App\Book::orderBy('name', 'asc')->paginate(40);
            }else{
                 $books=\App\Book::orderBy('name', 'desc')->paginate(40);
            }
           
        }else{
            $books=\App\Book::with('category')->latest()->paginate(40);
        }
        
    	return view('books', compact('books'));
    }

    public function posts()
    {
        $posts=Post::where('status', 'active')->get();
    	return view('posts', compact('posts'));
    }

    public function bookCategory($id)
    {

        if (isset($_GET['sort'])) {
            if ($_GET['sort']=='asc') {
                $books=\App\Book::where('category_id', $id)->orderBy('name', 'asc')->paginate(40);
            }else{
                 $books=\App\Book::where('category_id', $id)->orderBy('name', 'desc')->paginate(40);
            }
           
        }else{
            $books=\App\Book::where('category_id', $id)->latest()->paginate(40);
        }
       
        return view('books', compact('books'));
    }

    public function viewPost(Post $post)
    {
        $post->view=$post->view+1;
        $post->save();
        return view('viewPost', compact('post'));
    }

    public function signUp()
    {
        $regions=\App\Region::all();
        $districts=\App\District::all();
        $schools=\App\School::with('region')->get();
        $cat_courses=\App\CategoryCourse::all();
        return view('signUp', compact('regions', 'districts', 'schools', 'cat_courses'));
    }

    public function audios($id=null)
    {
        if ($id) {
            if (isset($_GET['sort'])) {
               if ($_GET['sort']=='asc') {
                  $audios=\App\Audio::where('category_id', $id)->orderBy('name', 'asc')->paginate(40);
               }else{
                  $audios=\App\Audio::where('category_id', $id)->orderBy('name', 'desc')->paginate(40);
               }
            }else{
                $audios=\App\Audio::where('category_id', $id)->paginate(40);
            }
            
        }else{
            if (isset($_GET['sort'])) {
               if ($_GET['sort']=='asc') {
                  $audios=\App\Audio::orderBy('name', 'asc')->paginate(40);
               }else{
                  $audios=\App\Audio::orderBy('name', 'desc')->paginate(40);
               }
            }else{
                $audios=\App\Audio::paginate(40);
            }   
        }
        
        return view('audios', compact('audios'));
    }

    public function videos($id=null)
    {
        if (isset($_GET['sort'])) {
            $sort=$_GET['sort'];
            if ($sort=='asc') {
                if ($id) {
                    $videos=\App\Video::where('category_id', $id)->orderBy('title', 'asc')->paginate(40);
                }else{
                    $videos=\App\Video::orderBy('title', 'asc')->paginate(40);
                } 
            }else{
                if ($id) {
                   $videos=\App\Video::where('category_id', $id)->orderBy('title', 'desc')->paginate(40);
                }else{
                    $videos=\App\Video::orderBy('title', 'desc')->paginate(40);
                }
            }
        }else{
           if($id){
                $videos=\App\Video::where('category_id', $id)->latest()->paginate(40);
            }else{
                $videos=\App\Video::latest()->paginate(40);
            }
        }
        
        return view('videos', compact('videos'));
    }

    public function applicants()
    {
        $posts=\App\Post::where('status', 'active')->whereNotNull('abiturient')->get();
        return view('posts', compact('posts'));
    }

    public function results()
    {
        $regions=\App\Region::orderBy('name_uz', 'asc')->get();
        return view('results', compact('regions'));
    }
}
