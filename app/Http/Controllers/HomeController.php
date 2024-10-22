<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class HomeController extends Controller
{
    public function home(){
        $blogs=[
            [
            'title'=>'Title One',
            'body'=>'This is a body text',
            'status'=>1,
            ],
        [
            'title'=>'Title Two',
            'body'=>'This is a body text',
            'status'=>0,
        ],
        [
            'title'=>'Title Three',
            'body'=>'This is a body text',
            'status'=>1,
        ],
        [
            'title'=>'Title Four',
            'body'=>'This is a body text',
            'status'=>1,
        ],
    ];
        return view('home',compact('blogs'));
    }

    public function index(){
       //return DB::table('posts')->where('id','>','10')->where('id','<','20')->get();
    //    DB::table('posts')->insert([
    //     [
    //         'title'=>'this is a test Data',
    //         'description'=>'Lorem ipsum dolor sit amet.',
    //         'status'=>1,
    //         'publish_date'=>date('Y-m-d'),
    //         'user_id'=>1,
    //         'category_id'=>2,
    //     ],
    //     [
    //         'title'=>'this is a test Data 2',
    //         'description'=>'Lorem ipsum dolor sit amet.',
    //         'status'=>1,
    //         'publish_date'=>date('Y-m-d'),
    //         'user_id'=>1,
    //         'category_id'=>3,
    //     ],
    //    ]);
    //    dd('success');

//     DB::table('posts')->where('id',3)->update([
//     'title'=>'hey we updated our title id 3',
//     'description'=>'this is updated description id 3.',
//    ]);
//    dd('success');
    // DB::table('posts')->where('id',3)->delete();
    // dd('success');
//   return  DB::table('posts')->join('categories','posts.category_id','=','categories.id')
//   ->select('categories.*')
//   ->get();
//return  DB::table('posts')->max('views');// count,min,max,avg,sum

//return $posts=Post::all();
//return Post::all(); //DB::table('posts')->get();
// $post= Post::find('2');
// return $post->title;
//return $post= Post::findOrFail('22');
// $posts= Post::all();
// foreach ($posts as $post){
//     echo $post->title;
// }
//return Post::where('views','>',value: 100)->where('id','=',4)->get();
//return Post::where('views','>',value: 600)->orWhere('id','=',2)->get();
// $post=new Post();
// $post->title='post 6';
// $post->description='this is post 6';
// $post->status=1;
// $post->publish_date=date('Y-m-d');
// $post->user_id=1;
// $post->category_id=1;
// $post->views=400;
// $post->save();
// dd('success');
// $post=Post::find(6);
// $post->title='this is a new title';
// $post->save();
//return Post::findOrFail(6)->delete();
//$post=Post::where('id,4')->first();
// $post=Post::create([
// 'title'=>'this is from mass assign',
// 'description'=>'this is description from mass assign',
//  'status'=>1,
//  'publish_date'=>date('Y-m-d'),
//  'user_id'=>1,
//  'category_id'=>2,
//  'views'=>500,
// ]);
//  $post=Post::where('status',1)->update([
//     'status'=>0,
//  ]);
//Post::where('id',7)->delete();
//return $posts= Post::onlyTrashed()->get();
// Post::withTrashed()->find(7)->restore();
//Post::withTrashed()->find(7)->forceDelete();
//return Post::all();
//dd('success');
//  $categories=Category::find(1)->posts;
// return view('hom',compact('categories'));
//pivot table between tags and posts tables
//$posts=Post::with('tags')->get();
//$tag=Tag::first();
//$post->tags()->attach([2,3,4]);
//return $post;
//return view('hom',compact('posts'));

//Storage::disk('public')->delete('/images/new_image.jpg');
//File::delete(storage_path('app/public/images/new_image.jpg'));
//unlink(storage_path('app/public/images/new_image.jpg'));
return view('hom');
//$posts=Post::all();
//return response()->json($posts);


    }
}
