<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController :: class, 'home'])
    -> name('home');
Route::get('/project/show/{project}', [MainController :: class, 'show'])
    -> name('project.show');

Route::middleware(['auth', 'verified'])
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {

    Route :: get('/project/create', [MainController :: class, 'create'])
        -> name('project.create');
    Route :: post('/project/create', [MainController :: class, 'store'])
        -> name('project.store');

    Route :: get('/project/edit/{project}', [MainController :: class, 'edit'])
        -> name('project.edit');
    Route :: post('/project/edit/{project}', [MainController :: class, 'update'])
        -> name('project.update');

    Route :: get('/project/delete/{project}', [MainController :: class, 'delete'])
        -> name('project.delete');

    // Route::get('/', [MainController :: class, 'privateHome']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
