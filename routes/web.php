<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Models\User;


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


// home page
Route::get('/', function() {
    return Inertia::render('Home');
});
// about page
Route::get('/About', function() {
    return Inertia::render('About');
});

// contact page
Route::get('/Contact', function() {
    return Inertia::render('Contact');
});

// submit contact form
Route::post('/Contact', function(Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'message' => 'required',
    ]);
     dd($validated);
    return redirect('/')->with('success', 'Your message has been sent');
});

//signup page
Route::get('/users/create', [UsersController::class, 'create']);
// create a new user
Route::post('/users', [UsersController::class, 'store']);

// only authenticated users can access this route
Route::middleware('auth')->group(function(){
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    // Shows a list of all users
    Route::get('users', [UsersController::class, 'index']);
    // Shows a single user profile
    Route::get('users/show', [UsersController::class, 'show']);
});


// login page
Route::get('login', [LoginController::class, 'create'])->name('login');
// login a user
Route::post('login', [LoginController::class, 'store']);
// logout a user
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');


