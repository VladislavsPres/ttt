<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Models\User;
use App\Models\Photo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $usersCount  = User::count();
    $photosCount = Photo::count();
    return view('dashboard', compact('usersCount', 'photosCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

// === AUTH + PROFILE ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// === LOCALE SWITCHING ===
Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale.switch');

// === RESOURCES ===
Route::resource('user', UserController::class);
Route::get('/galleries/{gallery}/photos/create', [PhotoController::class, 'create'])->name('photos.create');
Route::resource('photos', PhotoController::class)->except(['create']);
Route::resource('galleries', GalleryController::class);

Route::get('/dashboard', function () {
    $usersCount  = User::count();
    $photosCount = Photo::count();
    $recentLogs  = \App\Models\ActivityLog::latest()->take(5)->with('user')->get();

    return view('dashboard', compact('usersCount', 'photosCount', 'recentLogs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/my-photos', [\App\Http\Controllers\PhotoController::class, 'myPhotos'])
    ->middleware(['auth'])
    ->name('photos.my');

require __DIR__.'/auth.php';
