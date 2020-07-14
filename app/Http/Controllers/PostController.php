<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // all posts
    public function index()
    {
        $posts = Post::all()->toArray();
        return array_reverse($posts);
    }

    // view single post
    public function view($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
    // add post
    public function add(Request $request)
    {
        $post = new Post([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'body' => $request->input('body'),
            'image' => $request->input('image'),
        ]);
        $post->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Post was added successfully'
            ]
        );
    }

    // edit post
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    // update post
    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json('Post was successfully updated');
    }

    // soft delete post
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Post was successfully deleted');
    }

     // restore post
     public function restore($id)
     {
        $post = Post::withTrashed()->find($id)->restore();
        return response()->json($post);
     }
     
     // get deleted
     public function indexDeleted()
     {
        $deletedposts = Post::onlyTrashed()->get()->toArray();
        return array_reverse($deletedposts);
     }

}
