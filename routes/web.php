<?php

use App\Http\Controllers\emailController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


Route::any('/', function () {
    return redirect()->route('students.index');
});
// Route::any('/users', function () {
//     return redirect()->route('users.index');
// });


// // Route::get('hello/{id?}/name/{name?}', function ($id = null, $name = null) {

// //     if ($id && $name) {

// //         return "<h1>your id " . $id . " and name: " . $name . "</h1>";
// //     } else {
// //         return "id and name is not mentioned";
// //     }
// //     // return view('hello');
// // })->whereAlpha('name')->whereNumber('id')->name('hello');

// Route::view('/hello', 'hello')->name('hello');
// route::get('/test', function () {

//     return view('about');
// })->name('about');

// route::redirect('about', '/test');


// // route::prefix('pages')->group(function () {

// // });

// route::fallback(function () {
//     return "<h1>this page does not  exist</h1>";
// });

// Route::get('/post', function () {
//     return view('post');
// })->name('post');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/test-page', function () {
//     // return view('test', ['test' => "data from route to view"]);
//     return view('test')->with(['test' => "data from route to view"]);
// })->name('test');

// route::get('/controller/{id}', [pageController::class, 'showUser'])->name('test');

// Route::get('/test', function () {
//     return view('test', ['user' => "vvk"]);
// });

// Route::get('/test', [pageController::class, 'show']);
// Route::get('/test/{id}', [pageController::class, 'show']);

// Route::controller(pageController::class)->group(function () {

//     route::get('/test/{id}');
// });

// Route::get('/users', [testController::class, 'index']);
// // Route::get('/singleUser/{$id}', [testController::class, 'SingleUser']);


// Route::get('/new', function () {
//     return view('new');
// });
// Route::post('/add-edit', [StudentController::class, 'create'])->name('add.edit');
//

// Route::get('/form', function () {
//     return view('pages.crud.add-edit');
// });
// Route::post('/add', [StudentController::class, 'addStudent'])->name('addUser');

// Route::resource('users', UserController::class)->only(['index'])->middleware(Validuser::class);
Route::resource('/students', StudentController::class)->except(['show']);
Route::resource('/tests', TestController::class);
Route::resource('users', UserController::class)->middleware('UserAuth');
// Route::resource('users', UserController::class);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginHandle'])->name('loginHandle');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');





// email handlings

// Route::get('sendmail', [emailController::class, 'sendmail']);

// Route::any('/mail', function () {
//     return view('mail.mail');
// });
Route::get('sendmail', [emailController::class, 'contactForm']);
Route::post('sendmail', [emailController::class, 'sendmail'])->name('send.form');
