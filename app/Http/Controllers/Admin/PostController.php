<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts  = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);

        if($validatedData) {
            // mapping
            $post = new Post();
            $request->hasFile('image') ? $post->image = $request->image->store('uploaded'): 'Not available';
            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->category_id = $request->category_id;
            $saveData = $post->save();
            $post->tags()->sync($request->tag_id);
        }

        // send flash message
        if ($saveData) {
            return back()->with('success', 'Post created successfully!');
        }
        else {
            return back()->with('error', 'whoops something wrong, try again!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with(['tags','category'])->where('id',$id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);

        if ($validatedData) {
            $post = Post::find($id);
           
            if($request->hasFile('image'))
                 $post->image = $request->image->store('uploaded');

            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->status = $request->status;
            $post->category_id = $request->category_id;
            $saveData = $post->save();
            $post->tags()->sync($request->tag_id);
        }

         // send flash message
        if ($saveData) {
            return back()->with('success', 'Post updated successfully!');
        } else {
            return back()->with('error', 'whoops something wrong, try again!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
