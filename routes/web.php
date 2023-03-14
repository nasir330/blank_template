<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendsController;

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
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/friends-list',[FriendsController::class,'index'])->name('friends.list');
    Route::get('/friends-view/{id}',[FriendsController::class,'open'])->name('friends.view');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/edit-profile-photo', [ProfileController::class, 'editPhoto'])->name('edit.profile.photo');
    Route::post('/edit-profile-info', [ProfileController::class, 'editInfo'])->name('edit.profile.info');
    Route::post('/update-profile-info', [ProfileController::class, 'updateInfo'])->name('update.profile.info');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
