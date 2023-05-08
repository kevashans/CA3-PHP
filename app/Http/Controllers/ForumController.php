<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('forum', compact('posts'));
    }

    public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $forum = new Forum();
        $forum->title = $data['title'];
        $forum->description = $data['description'];
        $forum->save();

        return redirect('/forums/' . $forum->id);
    }


}
