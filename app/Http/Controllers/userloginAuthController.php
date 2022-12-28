<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\blog;
use App\Models\like;

class userloginAuthController extends Controller
{
    public function login(){
return view('auth.login');
    }
    public function registration(){
return view('auth.registration');
    }
   public function registerUser(request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:8|max:12',
            'password_confirmation'=>'required'
        ]);

        $user =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt ($request ->password);
        $user->save();
        
        
            return back()->with('success','you have registered succeessfuly');
       
           
        }

        public function loginUser(Request $request){
            $request->validate([
              'email'=>'required|email',
              'password'=>'required|min:5|max:12'
            ]);

            $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return view('auth.wlm');
                        
        }
  
        return redirect()->back()->with('loginfailed','Login details are not valid');

        }
        public function logout(Request $request){
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect(url('login'));
        }
  public function users(){
    // return auth()->user();
    $id= auth()->user()->id;
    $data = User::orderBy('id','desc')->get();
    return view('auth.home',compact('data'));
  }
  public function ViewUserBlog($id){
    $blog = blog::all()->where('user_id',$id);
    return view('auth.view_users_blogs',compact('blog','id'));
  }
  public function ViewMyBlog(){
    $id= auth()->user()->id;
    $blog = blog::where('user_id',$id)->orderBy('id','desc')->get();
    return view('auth.view_my_blog',compact('blog','id'));
  }


  public function ViewSingleUserBlog($user_id,$blog_id){
        $blogs = blog::all()->where('id',$blog_id);
        $blog = blog::all()->where('user_id',$user_id);

        foreach ($blogs as $key => $value) {
            $view=$value->view_count;
        }
        
        $views_count=$view+1;

        blog::where('id',$blog_id)->update([
            'view_count'=>$views_count]);

        return view('auth.ViewSingleUserBlog',compact('blog','blog_id','user_id'));
  }

  public function Like($blog_id){
    $user_id=auth()->user()->id;
    $like=like::all()->where('blog_id',$blog_id)->where('user_id',$user_id);
    $count_like=collect($like)->count();

    if ($count_like == 0) {
        
        $likes =new like;
        $likes->blog_id = $blog_id;
        $likes->like = 1;
        $likes->unlike = 0;
        $likes->user_id = $user_id;
        $likes->save();

        return redirect()->back();

    }

    $Exist_like=like::all()->where('blog_id',$blog_id)->where('user_id',$user_id)->where('like',1)->where('unlike',0);
    $count_exi_like=collect($Exist_like)->count();


    if($count_exi_like == 1){
        
        like::where('blog_id',$blog_id)->where('user_id',$user_id)->where('like',1)->where('unlike',0)->update([
            'blog_id' => $blog_id,
            'like' => 0,
            'unlike' => 1,
            'user_id' => $user_id,
        ]);
        return redirect()->back();

    }


    $like_again=like::all()->where('blog_id',$blog_id)->where('user_id',$user_id)->where('like',0)->where('unlike',1);
    $counts_like=collect($like_again)->count();

        if ($counts_like == 1) {
            like::where('blog_id',$blog_id)->where('user_id',$user_id)->where('like',0)->where('unlike',1)->update([
                'blog_id' => $blog_id,
                'like' => 1,
                'unlike' => 0,
                'user_id' => $user_id,
            ]);
            return redirect()->back();
        }


  }

}
