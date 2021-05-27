<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/about', function(){
    return view('about');
});

Route::get('/home', function(){
    echo "this is home page";
});

//category controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::get('/contact', [ContactController::class, 'index'])->name('con');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();

    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');