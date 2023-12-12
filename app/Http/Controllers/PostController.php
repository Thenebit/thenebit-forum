<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $data = Post::all();

        return view('pages.home', compact('data'));
    }

    public function store(Request $request) {
      
        $blog = new Post;
   //  Image first
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $extention = $file->getClientOriginalExtension();
         $imagename = time().'.'.$extention;
         $file->move('blogStorage', $imagename);

         $blog->image=$imagename;
      }

      // $request->validate([
      //    'author' => 'required',
      //    'image' => 'required',
      //    'title' => 'required',
      //    'postType' => 'required',
      //    'description' => 'required',
      // ]);

      $blog->author = $request->author;
      $blog->title = $request->title;
      $blog->postType = $request->postType;
      $blog->description = $request->description;

      $blog->save();

      return redirect()->back()->with('success', 'Sent success');
    }

    public function create() {
        return view('pages.create');
    }

    public function show($id) {

        $data = Post::find($id);

        return view('pages.show', compact('data'));
    }

    public function test() {
        return view('pages.test');
    }
}
