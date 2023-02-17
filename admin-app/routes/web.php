<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedNoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StaffProfileController;

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


Route::resource('/', StaffProfileController::class);

Route::get('/staffprofile', function () {
    return view('staffprofile.index');
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/notification', NotificationController::class)->middleware(['auth']);
/*
Route::prefix('/trashed'->name('trashed.'))->middleware(['auth'])->group(function(){
        Route::get('/', [TrashedNoteController::class,'index'])->('index');
        Route::get('/{notification}', [TrashedNoteController::class,'show'])->withTrashed();
        Route::put('/{notification}', [TrashedNoteController::class,'update'])->withTrashed();
        Route::delete('/{notification}', [TrashedNoteController::class,'destroy'])->withTrashed();
    });
*/

    Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function(){
        Route::get('/', [TrashedNoteController::class, 'index'])->name('index');
        Route::get('/{notification}', [TrashedNoteController::class, 'show'])->name('show')->withTrashed();
        Route::put('/{notification}', [TrashedNoteController::class, 'update'])->name('update')->withTrashed();
        Route::delete('/{notification}', [TrashedNoteController::class, 'destroy'])->name('destroy')->withTrashed();
});
/*
Route::get('/trashed', [TrashedNoteController::class,'index'])
    ->middleware(['auth'])
    ->name('trashed.index');

Route::get('/trashed/{notification}', [TrashedNoteController::class,'show'])
    ->withTrashed()
    ->middleware(['auth'])
    ->name('trashed.show');

Route::put('/trashed/{notification}', [TrashedNoteController::class,'update'])
    ->withTrashed()
    ->middleware(['auth'])
    ->name('trashed.update');
*/

  //  ->name('trashed.show');

/*Route::get('/notification',);

Route::get('/notification/{notid}',);

Route::get('/notification/create',);

Route::post('/notification',);
*/
//edit
//update
//destroy

require __DIR__.'/auth.php';
