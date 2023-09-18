<?php

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

//route for return test view
Route::get('/testURL',function(){
    return view("test");
});

// Route::get('student',function(){
//     return view("student");
// });


//redirct rout
Route::redirect('/firstURL', '/testURL');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route for return student view
Route::get("/studentWithController",
[App\Http\Controllers\student::class, 'returnStudentView']);


//route for retun add users view
Route::get("/addUser",[App\Http\Controllers\student::class,'returnAddUserView']);

//add user details for db
Route::post("/addUserDetails",[App\Http\Controllers\student::class,'AddUsers']);

//return view users view
Route::get('/viewUsers',[App\Http\Controllers\student::class,'viewUsers']);

//route for delete user

Route::get('/deleteUser/{id}',[App\Http\Controllers\student::class,'deleteUser']);

//route for edit user



// Define a named route for displaying the edit form
Route::get('/editUser/{id}', [App\Http\Controllers\student::class, 'editUserView'])->name('editUser');

// Define a named route for updating the user data
Route::put('/updateUser/{id}', [App\Http\Controllers\student::class, 'updateUser'])->name('updateUser');