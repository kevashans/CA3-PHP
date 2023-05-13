<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Following;
use App\Models\Topics;


class FollowingController extends Controller
{
            /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Following::create($input);
   
        return back();
    }

    public function delete(\Illuminate\Http\Request $request)
{
    $input = $request->all();
    $input['user_id'] = auth()->user()->id;
    // TODO: Check for validation
    $todelete = Following::where('user_id', $input['user_id'])->where('topic_id', $input['topic_id'])->first();
    $todelete -> delete();
    return back();
}

public function followedForums(\Illuminate\Http\Request $request)
{
    $input = $request->all();
    $input['user_id'] = auth()->user()->id;

    $items= Following::select('topic_id')->where('user_id', $input['user_id'])->get();

    foreach ($items as $item) {
        $todisplay = Topics::where('topic_id', $item);
    }
   

    return view('forums.followed')
    ->with($todisplay);
    
}
    
}
