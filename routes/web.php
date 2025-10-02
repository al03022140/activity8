use App\Http\Controllers\TestController;
// TestController routes for courses
Route::get('/courses', [TestController::class, 'index']); // Get all courses
Route::post('/courses', [TestController::class, 'create']); // Create a course
Route::get('/courses/{id}', [TestController::class, 'read']); // Get one course
Route::put('/courses/{id}', [TestController::class, 'update']); // Update a course
Route::delete('/courses/{id}', [TestController::class, 'delete']); // Delete a course
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para mostrar usuarios (solo usuarios autenticados pueden ver)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
