<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index']);
Route::get('/contacts', [MainController::class, 'contacts']);
Route::get('/contact/{id}', [MainController::class, 'showContacts']);
Route::post('get-contacts', [MainController::class, 'getContacts']);
Route::post('/set-review', [ReviewController::class, 'setReview']);
Route::get('/review', [ReviewController::class, 'index']);