<?php
 use App\Http\Controllers\userloginAuthController;
 use App\Http\Controllers\blogpostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 route::post('/addblog',[blogpostController::class,'blog'])->name('add_blog');
route::get('view_blog/{email}',[blogpostController::class,'viewBlogs'])->name('viewblogs');
// route::post('/register-user',[userloginAuthController::class,'registerUser']) ->name('register-user');
// route::post('/loginuser',[userloginAuthController::class,'loginUser']) ->name('login-user');
 route::get('/home',[userloginAuthController::class,'users']);
 //route::get('/home',[userloginAuthController::class,'users']);
 route::get('ViewUserBlog/{id}',[userloginAuthController::class,'ViewUserBlog']);
 Route::get('/add_blogs', function () {
    return view('auth.add_blog');
})->name('add');
Route::get('ViewMyBlog',[userloginAuthController::class,'ViewMyBlog'])->name('MyBlog');
Route::get('ViewSingleUserBlog/{user_id}/{blog_id}',[userloginAuthController::class,'ViewSingleUserBlog']);
Route::get('like/{blog_id}',[userloginAuthController::class,'Like']);


//Route::post('/logout', function () {
//     return view('auth.logout');
// });