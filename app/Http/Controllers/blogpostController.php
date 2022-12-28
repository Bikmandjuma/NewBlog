<?php

namespace App\Http\Controllers;
use App\Models\blog;

use Illuminate\Http\Request;

class blogpostController extends Controller
{
    public function blog(Request $request){
        $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:255',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif',
        ]);

        $blog = new blog;
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/blog'), $filename);
            $blog['image']= $filename;
        }
        
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->view_count = 0;
        $blog->like = 0;
        $blog->user_id= auth()->user()->id;
    
        $blog->save();
        return back()->with('success',"Your blog added  successfully !");
        
    }
    public function viewBlogs($email){
       $blogs = blog::all()->where('email',$email);
       return view('auth.view_users_blogs',compact('blogs','email'));
    }
}
