<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function ourfileStore(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if(isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;
        // $post->image = time() . '-' . $request->file('image')->getClientOriginalName();
        // if ($request->hasFile('image')) {
        //     $request->file('image')->move(public_path('images'), $post->image);
        // } else {
        //     $post->image = null; // Set to null if no image is uploaded
        // }

        // $post->image = time() . '.' . $request->image->extension();

        $post->image = $imageName;



        $post->save();

        flash()->success('Post created successfully!');

        return redirect()->route('home');

    }

    public function editData($id)
    {

        $posts = Post::findOrFail($id);
        return view('edit', ['ourPosts' => $posts]);
    }

    public function updateData($id, Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the post by ID
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

         
        if(isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;

        }
        else {
            // If no new image is uploaded, keep the existing image
            $post->image = $post->image;
        }

        $post->save();

        flash()->success('Post updated successfully!');

        return redirect()->route('home');
    }

    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        flash()->success('Post deleted successfully!');

        return redirect()->route('home');
    }
}
