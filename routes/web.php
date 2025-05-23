<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\AccreditationEntryController;

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
// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Landing
Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard_admin');

    // ✅ Entry per kriteria - tampilkan semua entry untuk satu kriteria
    Route::get('/entries/criteria/{criteria}', [AccreditationEntryController::class, 'index'])
        ->name('entries.by.criteria');

    // ✅ Form create entry untuk satu kriteria
    Route::get('/entries/create/criteria/{criteria}', [AccreditationEntryController::class, 'create'])
        ->name('entries.create.by.criteria');

    // ✅ Simpan entry baru untuk satu kriteria
    Route::post('/entries/criteria/{criteria}', [AccreditationEntryController::class, 'store'])
        ->name('entries.store.by.criteria');

    // ✅ Edit entry — tetap bisa pakai entry ID karena sudah terhubung ke criteria melalui section
    Route::get('/entries/{entry}/edit', [AccreditationEntryController::class, 'edit'])
        ->name('entries.edit');

    // ✅ Update entry
    Route::put('/entries/{entry}', [AccreditationEntryController::class, 'update'])
        ->name('entries.update');

    // ✅ Submit entry
    Route::post('/entries/{entry}/submit', [AccreditationEntryController::class, 'submit'])
        ->name('entries.submit');

    // ✅ Hapus entry (opsional)
    Route::delete('/entries/{entry}', [AccreditationEntryController::class, 'destroy'])
        ->name('entries.destroy');
});

// Validator
Route::middleware(['auth', 'role:validator1,validator2'])->group(function () {
   Route::get('/validator/dashboard', function () {
    return view('validator.dashboard');
})->name('dashboard_validator');


    // Route baru untuk list validation filtered by criteria
    Route::get('/validation/criteria/{criteria}', [ValidationController::class, 'indexByCriteria'])
        ->name('validation.by.criteria');

    Route::get('validation', [ValidationController::class, 'index'])->name('validation.index');
    Route::get('validation/{entry}', [ValidationController::class, 'show'])->name('validation.show');
    Route::post('validation/{entry}', [ValidationController::class, 'validateEntry'])->name('validation.process');

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
});
