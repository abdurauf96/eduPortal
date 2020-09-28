<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function audios()
    {
    	if (request()->isMethod('post')) {
    		//dd(request()->all());
    		$audio=new \App\Audio();
    		$file=request('audio');
    		$filename=$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
    		$path='files/audios/';
    		$file->move($path, $filename);
    		$audio->audio='/files/audios/'.$filename;
    		$audio->name=request('name');
    		$audio->category_id=request('category_id');
    		$audio->save();
    		return back();
    		
    	}else{
    		$audios=\App\Audio::with('category')->get();
    		$categories=\App\CategoryAudio::all();
    		return view('admin.media.audios', compact('categories', 'audios'));
    	}
    	
    }

    public function audioCategory()
    {
    	if(request()->isMethod('post')){
    		$cat=new \App\CategoryAudio();
    		$cat->name_uz=request('name_uz');
    		$cat->name_ru=request('name_ru');
    		$cat->name_en=request('name_en');
    		$cat->save();
    		return back();
    	}else{
    		$categories=\App\CategoryAudio::all();
    		return view('admin.media.audioCategories', compact('categories'));
    	}
    }

    public function videos()
    {
        if (request()->isMethod('post')) {
            $video=new \App\Video();
            
            $video->title=request('title');
            $video->link=request('link');
            $video->category_id=request('category_id');
            $video->save();
            return back();
            
        }else{
            $videos=\App\Video::with('category')->get();
            $categories=\App\CategoryVideo::all();
            return view('admin.media.videos', compact('categories', 'videos'));
        }   
    }

    public function videoCategory()
    {
        if(request()->isMethod('post')){
            $cat=new \App\CategoryVideo();
            $cat->name_uz=request('name_uz');
            $cat->name_ru=request('name_ru');
            $cat->name_en=request('name_en');
            $cat->save();
            return back();
        }else{
            $categories=\App\CategoryVideo::all();
            return view('admin.media.videoCategories', compact('categories'));
        }
    }

    public function deleteAudio(\App\Audio $audio)
    {
        $audio->delete();
        return back()->with('flash', 'deleted successfully');
    }

    public function deleteVideo(\App\Video $video)
    {
        $video->delete();
        return back()->with('flash', 'deleted successfully');
    }

    public function thoughts()
    {
        if (request()->isMethod('post')) {

            $item=new \App\Thought();
            
            $item->text_uz=request('text_uz');
            $item->text_ru=request('text_ru');
            $item->text_en=request('text_en');
            $item->author_uz=request('author_uz');
            $item->author_ru=request('author_ru');
            $item->author_en=request('author_en');
            $item->save();
            return back();
        }else{
            $thoughts=\App\Thought::all();
            return view('admin.thoughts', compact('thoughts'));
        }
    }

    public function editThought(\App\Thought $thought)
    {
        if (request()->isMethod('post')) {
            $thought->text_uz=request('text_uz');
            $thought->text_ru=request('text_ru');
            $thought->text_en=request('text_en');
            $thought->author_uz=request('author_uz');
            $thought->author_ru=request('author_ru');
            $thought->author_en=request('author_en');
            $thought->update();
            return redirect()->route('thoughts');
        }else{
            return view('admin.editThought', compact('thought'));
        }
    }

    public function testResults()
    {
        
        if (request()->isMethod('post')) {
            
            $result=new \App\Result();
            if (request()->hasFile('result')) {
                $file=request('result');
                $filename=$file->getClientOriginalName();
                $file->move('files/results/', $filename);
                $result->result='/files/results/'.$filename;
            }
            $result->region_id=request('region_id');
            $result->title_uz=request('title_uz');
            $result->title_ru=request('title_ru');
            $result->title_en=request('title_en');
            $result->save();
            return back();
        }else{
            $results=\App\Result::with('region')->paginate(10);
            $regions=\App\Region::all();
            return view('admin.testResults', compact('results','regions'));
        }
    }
}
