<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function showEditScreen(Post $post){
        return view('edit-post', ['post' => $post]);
    }


    public function createPost(Request $request){
        $incommingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $incommingFields['title'] = strip_tags($incommingFields['title']);
        $incommingFields['body'] = strip_tags($incommingFields['body']);
        $incommingFields['user_id'] = auth()->id();
        Post::create($incommingFields);
        return redirect('/');
    }
}
