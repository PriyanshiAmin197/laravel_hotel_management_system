<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
//     return view('home.index');
// });

Route::get('/', [AdminController::class, 'home']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware(['auth', 'admin']);
Route::get('/create_room', [AdminController::class, 'create_room'])->middleware(['auth', 'admin']);
Route::post('/add_room', [AdminController::class, 'add_room'])->middleware(['auth', 'admin']);
Route::get('/view_room', [AdminController::class, 'view_room'])->middleware(['auth', 'admin']);
Route::get('/room_delete/{id}', [AdminController::class, 'room_delete'])->middleware(['auth', 'admin']);
Route::get('/room_update/{id}', [AdminController::class, 'room_update'])->middleware(['auth', 'admin']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware(['auth', 'admin']);
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->middleware(['auth', 'admin']);
Route::get('/approve_room/{id}', [AdminController::class, 'approve_room'])->middleware(['auth', 'admin']);
Route::get('/reject_room/{id}', [AdminController::class, 'reject_room'])->middleware(['auth', 'admin']);
Route::get('/view_gallary', [AdminController::class, 'view_gallary'])->middleware(['auth', 'admin']);
Route::post('/upload_gallary', [AdminController::class, 'upload_gallary'])->middleware(['auth', 'admin']);
Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary'])->middleware(['auth', 'admin']);
Route::get('/all_messages', [AdminController::class, 'all_messages'])->middleware(['auth', 'admin']);
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->middleware(['auth', 'admin']);
Route::post('/mail/{id}', [AdminController::class, 'mail'])->middleware(['auth', 'admin']);
Route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin']);


Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/our_room', [HomeController::class, 'our_room']);
Route::get('/hotel_gallery', [HomeController::class, 'hotel_gallery']);
Route::get('/contact_us', [HomeController::class, 'contact_us']);





