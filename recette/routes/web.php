<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\CategoryController;
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

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/create/recette', [RecetteController::class, 'create'])->name('recette.create');
Route::post('/create/recette', [RecetteController::class, 'store'])->name('recette.store');
Route::get('/recettes', [RecetteController::class, 'index'])->name('recette.index');
Route::get('/recette/{recette}', [RecetteController::class, 'show'])->name('recette.show');
Route::get('/edit/recette/{recette}', [RecetteController::class, 'edit'])->name('recette.edit');
Route::put('/edit/recette/{recette}', [RecetteController::class, 'update'])->name('recette.update');
Route::delete('/recette/{recette}', [RecetteController::class, 'destroy'])->name('recette.delete');
Route::get('/completed/recette/{completed}', [RecetteController::class, 'completed'])->name('recette.completed');

// Pour valider l'identité de l'utilisateur pour cette route
// the /recettes route is protected by the auth middleware, which ensures that only authenticated users can access the route.

/* Route::get('/recettes', [RecetteController::class, 'index'])->name('recette.index')->middleware('auth'); */



Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');
Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');



Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');



Route::get('/create/category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/edit/category/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/edit/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.delete');




Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');



Route::get('/recette-pdf/{recette}', [RecetteController::class, 'pdf'])->name('recette.pdf');

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

