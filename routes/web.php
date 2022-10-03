<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\User\PlanController as UserPlanController;
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



Route::middleware(['auth'])->name('user.')->prefix('user')->group(function () {
    Route::get('/',[UserController::class,'index'])->name('index');
Route::get('/edit',[UserController::class,'edit'])->name('edit');
Route::put('/edit/{id}',[UserController::class,'update'])->name('update');
Route::get('/plan',[UserPlanController::class,'index'])->name('plan.index');
Route::get('/plan/show/{id}',[UserPlanController::class,'show'])->name('plan.show');
Route::put('/plan/{id}',[UserPlanController::class,'programComplete'])->name('programComplete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/exercise', ExerciseController::class);
    
    Route::resource('/program', ProgramController::class);
    Route::resource('/members', MembersController::class);
    Route::resource('/plan', PlanController::class);
});





require __DIR__.'/auth.php';
