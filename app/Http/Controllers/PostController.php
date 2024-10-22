<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('authcheck2');
        //$this->middleware('authcheck2')->only(['create','show']);
        //$this->middleware('authcheck2')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        
        //$posts=Post::paginate(3);
        $posts=Cache::remember('posts-page-'.request('page',1),60*3,function(){
            return Post::with('category')->paginate(3);
        });
        // $posts=Cache::rememberForever('posts',function(){
        //     return Post::with('category')->paginate(3);
        // });
        return view('index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>['required','max:2028','image'],
            'title'=>['required','max:255'],
            'category_id'=>['required','integer'],
            'description'=>['required'],
        ]);
        $post=new Post();

        $fileName=time().'_'.$request->image->getClientOriginalName();
        $filePath=$request->image->storeAs('images',$fileName);//images/filename

        $post->title=$request->title;
        $post->description=$request->description;
        $post->category_id=$request->category_id;
        $post->image='storage/'.$filePath;//storage/images/filename
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        $categories=Category::all();
        return view('edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>['required','max:255'],
            'category_id'=>['required','integer'],
            'description'=>['required'],
        ]);

        $post=Post::findOrFail($id);

        if($request->hasFile('image')){
            $request->validate([  
                'image'=>['required','max:2028','image'],
            ]);
            
        $fileName=time().'_'.$request->image->getClientOriginalName();
        $filePath=$request->image->storeAs('images',$fileName);//images/filename

        File::delete(public_path($post->image));

        $post->image='storage/'.$filePath;//storage/images/filename
        }

        $post->title=$request->title;
        $post->description=$request->description;
        $post->category_id=$request->category_id;
        
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function trashed(){
        $posts=Post::onlyTrashed()->get();
        return view('trashed',compact('posts'));
    }
    public function restore($id){
        $post=Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }
    public function forceDelete($id){
        $post=Post::onlyTrashed()->findOrFail($id);
        File::delete(public_path($post->image));
        $post->forceDelete();
        return redirect()->back();
    }
}
