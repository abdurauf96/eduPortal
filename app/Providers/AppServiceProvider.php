<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layout', function($view){
            $schools=\App\School::all();
            $regions=\App\Region::all();
            $districts=\App\District::all();
            $courses=\App\Course::all();
            $categories=\App\Category::all();
            $audio_cats=\App\CategoryAudio::all();
            $video_cats=\App\CategoryVideo::all();
            $videos=\App\Video::all();
            $audios=\App\Audio::all();
            $books=\App\Book::all();
            $posts=\App\Post::all();
            $msg=count(\App\Message::all());
            $view->with(compact('schools', 'regions', 'districts', 'courses', 'books', 'categories', 'posts', 'audio_cats', 'video_cats', 'videos', 'audios', 'msg'));
        });

        view()->composer('layouts.index', function($view){
            $categories=\App\Category::all();
            $audio_cats=\App\CategoryAudio::all();
            $video_cats=\App\CategoryVideo::all();
            $posts=\App\Post::latest()->limit(2)->get();
            $view->with(compact('categories', 'audio_cats', 'video_cats', 'posts'));
        });

        view()->composer('layouts.sidebar', function($view){
            $posts=\App\Post::where('status', 'active')->latest()->limit(4)->get();
            $view->with(compact('posts'));
        });
    }
}
