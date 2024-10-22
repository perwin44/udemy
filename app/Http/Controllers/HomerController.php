<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
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
}
