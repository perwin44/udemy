<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class,'home'])->name('about');

Route::get('/home', [HomeController::class,'index']);

Route::get('/contact',[ContactController::class,'index']);

Route::get('contact/{id}',function($id){
    return ($id);
})->name('edit-contact');

Route::get('homer',function(){
    return "<a href='".route('edit-contact','1')."'>About</a";
});



Route::group(['prefix'=>'customer'],function(){

Route::get('/',function(){
    return "<h1>customer list</h1>";
});

Route::get('/create',function(){
    return "<h1>customer create</h1>";
});

Route::get('/show',function(){
    return "<h1>customer show</h1>";
});

});

Route::fallback(function(){
    return "route not exist";
});

Route::resource('blog', BlogController::class);

Route::get('/homerr',HomerController::class);//invokable single action controller

Route::get('/login',[LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'handlelogin'])->name('login.submit');

Route::get('/hom',[HomeController::class,'index']);

Route::post('/upload_file',[ImageController::class,'handleImage'])->name('upload_file');
Route::get('/success',function(){
    return "<h1>Successfully Uploaded</h1>";
})->name('success');
Route::get('/download',[ImageController::class,'download'])->name('download');


Route::get('/posts/trash',[PostController::class,'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore',[PostController::class,'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete',[PostController::class,'forceDelete'])->name('posts.forceDelete');

Route::resource('posts',PostController::class);

Route::get('/unavailable',function(){
    return view('unavailable');
})->name('unavailable');

Route::group(["middleware"=>"authcheck"],function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    });
    Route::get('/profile',function(){
        return view('profile');
    });
});

Route::get('contact',function(){
    $post=Post::all();
    return view('contact',compact('post'));
});

Route::get('send-mail',function(){
    // Mail::raw('Hello World this is a test mail',function($message){
    //     $message->to('pnonjida@gmail.com')->subject('noreplay');
    // });
    Mail::send(new OrderShipped);
    dd('success');
});

Route::get('/get-session',function(Request $request){
    // $session=session()->all();
    //dd($session);
    $data=$request->session()->all();
    //$data=$request->session()->get('_token');
    dd($data);
});
Route::get('save-session',function(Request $request){
    $request->session()->put(['user_status'=>'logged_in']);
    session(['user_ip'=>'123.23.11']);
    return redirect('get-session');
});
Route::get('/destroy-session',function(Request $request){
    //$request->session()->forget(['user_id','user_status']);
    session()->forget('user_ip');
    session()->flush();
    return redirect('get-session');
});
Route::get('/flash-session',function(Request $request){
    $request->session()->flash('message','hello this is a flash message');
    return redirect('get-session');
});
Route::get('forget-cache',function(){
    Cache::forget('posts');
});