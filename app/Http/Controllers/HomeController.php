<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role=="admin") {
            $schools=\App\School::all();
            $regions=\App\Region::all();
            $districts=\App\District::all();
            $courses=\App\Course::all();
            return view('admin.dashboard', compact('schools', 'regions', 'districts', 'courses'));

        }else{
          
            
            $school=\App\School::where('user_id', Auth::user()->id)->first();
            
            return view('home', compact('school'));
        }
        
    }
}
