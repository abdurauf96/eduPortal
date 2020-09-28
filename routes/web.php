<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('welcome');

Route::get('/lang/{locale}', function($locale){
	session(['locale'=>$locale]);
	return back();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/school/register', 'SchoolController@register');
Route::match( ['post', 'get'], '/school/{school}/edit', 'SchoolController@schoolEdit')->name('schoolEdit');
Route::get('/school/{school}', 'PageController@viewSchool')->name('viewSchool');
Route::post('/save_school', 'SchoolController@saveSchool');
Route::match(['get', 'post'], '/user/school/{school}', 'IndexController@userRegistration')->name('userRegistration');
Route::post('/save/register', 'IndexController@saveUserRegistration');
Route::get('/home/posts', 'SchoolController@posts')->name('userPosts');
Route::match( ['post', 'get'], '/home/posts/create', 'SchoolController@createPost')->name('userPostCreate');

Route::get('/about', 'PageController@about')->name('about');
Route::get('/books', 'PageController@books')->name('getBooks');
Route::get('/posts', 'PageController@posts')->name('getPosts');

Route::get('/applicants/posts', 'PageController@applicants')->name('applicants');
Route::get('/results', 'PageController@results')->name('results');

Route::get('/audios/{id?}', 'PageController@audios')->name('getAudios');
Route::get('/videos/{id?}', 'PageController@videos')->name('getVideos');
Route::get('/sign-up', 'PageController@signUp')->name('signUp');
Route::get('/abiturients', 'PageController@abiturients')->name('abiturients');
Route::match(['post', 'get'], '/jobs', 'QueryController@getJobs')->name('getJobs');
Route::match(['post', 'get'], '/jobseekers', 'QueryController@jobSeeker')->name('jobSeeker');

Route::get('/book/category/{id}', 'PageController@bookCategory')->name('bookCategory');
Route::get('/post/{post}', 'PageController@viewPost')->name('viewPost');
Route::post('/message', 'QueryController@message')->name('message');

//ajax
Route::post('/get-school', 'QueryController@getSchool');
Route::post('/res-school', 'QueryController@resSchool');
Route::post('/get-dist', 'QueryController@getDist');
Route::post('/view-schools', 'QueryController@viewSchools');
Route::post('/search_courses', 'QueryController@searchCourses');
Route::post('/get-univers', 'QueryController@getUnivers');

//admin routes
Route::prefix('admin')->group(function () {
	Route::get('regions', 'AdminController@regions')->name('regions');
	Route::get('add-region', 'AdminController@addRegion')->name('addRegion');
	Route::post('save-region', 'AdminController@saveRegion')->name('saveRegion');

	Route::match(['post', 'get'], 'school/{school}/edit', 'AdminController@editSchool')->name('editSchool');

	Route::get('districts', 'AdminController@districts')->name('districts');
	Route::match( ['post', 'get'], 'add-district', 'AdminController@addDistrict')->name('addDistrict');

	Route::match( ['post', 'get'],  'courses', 'AdminController@courses')->name('courses');
	Route::get('/course/{course}', 'AdminController@deleteCourse')->name('deleteCourse');
	Route::get('/course/{course}/edit', 'AdminController@editCourse')->name('editCourse');
	Route::patch('/course/{course}/update', 'AdminController@updateCourse')->name('updateCourse');
	
	Route::match(['post','get'], 'course-categories', 'AdminController@courseCategories')->name('courseCategories');
	Route::get('/course-categories/{category}', 'AdminController@deleteCourseCategory')->name('deleteCourseCategory');

	Route::get('schools', 'AdminController@schools')->name('schools');
	Route::match( ['post', 'get'],  'books', 'AdminController@books')->name('books');
	Route::get('/book/{book}', 'AdminController@deleteBook')->name('deleteBook');
	Route::match( ['post', 'get'],  'categories', 'AdminController@categories')->name('categories');
	Route::get('/category/{category}', 'AdminController@deleteCategory')->name('deleteCategory');
	Route::resource('posts', 'PostController');
	Route::match( ['post', 'get'],  'audios', 'MediaController@audios')->name('audios');
	Route::match( ['post', 'get'],  'audio-categories', 'MediaController@audioCategory')->name('audioCategory');
	Route::match( ['post', 'get'],  'videos', 'MediaController@videos')->name('videos');
	Route::match( ['post', 'get'],  'video-categories', 'MediaController@videoCategory')->name('videoCategory');
	Route::get('audio/{audio}/delete', 'MediaController@deleteAudio')->name('deleteAudio');
	Route::get('video/{video}/delete', 'MediaController@deleteVideo')->name('deleteVideo');
	Route::match( ['get', 'post'], 'thoughts', 'MediaController@thoughts')->name('thoughts');
	Route::match( ['get', 'post'], 'thought/{thought}', 'MediaController@editThought')->name('editThought');
	Route::match( ['get', 'post'], 'results', 'MediaController@testResults')->name('testResults');
	Route::get('messages/{id?}', 'AdminController@messages')->name('messages');
	//ajax
	Route::post('/get-dist', 'QueryController@getDist');

});






