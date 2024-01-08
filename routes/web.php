<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\DisplayController;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return view('display.display');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('organizer', OrganizerController::class)->except(['show']);
    Route::resource('gallery', GalleryController::class)->except([
        'edit',
        'update',
        'show',
    ]);
    Route::resource('news', NewsController::class);
    Route::resource('display', DisplayController::class);
});
Route::post('upload', [GalleryController::class, 'upload'])->name('upload');
