<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        
        $data = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comments' => 'required|string',
        ]);
    
        Comment::create($data);
    
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    
}
