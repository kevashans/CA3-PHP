<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;

class ForumsController extends Controller
{
    public function index()
    {
        return view('forums.index')
            ->with('topics', Topics::orderBy('id', 'DESC')->get())->with('tags', Tag::orderBy('name', 'ASC')->get());
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create')->with('tags', Tag::orderBy('name', 'ASC')->get());
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'topic_name' => 'required',
        //     'topic_description' => 'required',
        //     'topic_image' => 'required|mimes:jpg,png,jpeg|max:5048'
        // ]);

        // $newImageName = uniqid() . '-' . $request->topic_name . '.' . $request->topic_image->extension();

        // $request->image->move(public_path('images'), $newImageName);

        $newImageName = uniqid() . '-' . $request->topic_name . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $newImageName);

        Topics::create([
            'topic_name' => $request->input('topic_name'),
            'topic_description' => $request->input('topic_description'),
            // 'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'members' => 0,
            'topic_image' => $newImageName,
            // 'user_id' => auth()->user()->id,
            // 'topics_id'=>$request->input('topics_id')
            // 'post_id' => $request->input('post_id'),

        ])->attachTags($request->input('tags'));

        return redirect('/forums')
            ->with('message', 'Forum created!');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        $posts = null;


        // Search in the title and body columns from the posts table


        if (is_null($request->input('tags'))) {
            $posts = Topics::query()
                ->where('topic_name', 'LIKE', "%{$search}%")
                ->orWhere('topic_description', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $tags = implode(',', $request->input('tags'));
            $posts = Topics::query()
                ->where('topic_name', 'LIKE', "%{$search}%")
                ->orWhere('topic_description', 'LIKE', "%{$search}%")
                ->withAnyTags($tags)
                ->get();
        }

        // Return the search view with the results compacted
        return view('forums.search')
            ->with('posts', $posts)
            ->with('tags', Tag::orderBy('name', 'ASC')->get());
    }



}