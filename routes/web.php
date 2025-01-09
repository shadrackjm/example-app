<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'admin','auth'], function () {
    Route::get('/recipes', 'App\Http\Controllers\RecipeController@index')->name('recipes.index');
    Route::get('/recipe/show/{id}', 'App\Http\Controllers\RecipeController@show')->name('recipes.show');
    Route::get('/recipes/create', 'App\Http\Controllers\RecipeController@create')->name('recipes.create');
    Route::post('/recipes', 'App\Http\Controllers\RecipeController@store')->name('recipes.store');
    Route::get('/recipe/{id}/edit', 'App\Http\Controllers\RecipeController@edit')->name('recipes.edit');
    Route::put('/recipe/{id}', 'App\Http\Controllers\RecipeController@update')->name('recipes.update');
    Route::delete('/recipe/delete/{id}', 'App\Http\Controllers\RecipeController@destroy')->name('recipes.destroy');
});

Route::group(['middleware' => 'admin','auth'], function () {
    Route::get('/categories', 'App\Http\Controllers\CategoryController@index')
    ->name('categories.index');
    Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')
    ->name('categories.create');
    Route::post('/categories', 'App\Http\Controllers\CategoryController@store')
    ->name('categories.store');
    Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')
    ->name('categories.show');
    Route::get('/categories/{id}/edit', 'App\Http\Controllers\CategoryController@edit')
    ->name('categories.edit');
    Route::put('/categories/{id}', 'App\Http\Controllers\CategoryController@update')
    ->name('categories.update');
    Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy')
    ->name('categories.destroy');
});

Route::get('/dashboard', function () {
    $users = App\Models\User::count();
    $recipes = App\Models\Recipe::count();
    $categories = App\Models\Category::count();
    return view('dashboard', compact('users', 'recipes', 'categories'));
})->middleware(['admin','auth', 'verified'])->name('dashboard');

Route::get('/like/{id}', 'App\Http\Controllers\LikeController@like')->name('like');
Route::get('/user/recipes/{id}', [RecipeController::class,'show'])->name('user.recipes.show');

Route::get('/user/dashboard', function () {
    $recipes = App\Models\Recipe::with('category','likes')->get();
    return view('user.dashboard', compact( 'recipes'));
})->middleware(['user','auth', 'verified'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
