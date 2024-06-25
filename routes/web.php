<?php


use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


# home page
Route::get('/', [TaskController::class, 'getUserTasks'])->name('user.register');


# user part
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});

# task part
Route::post('add-task', [TaskController::class, 'store'])->name('task.store')->middleware('auth');
Route::get('add-task', function () {
    return view('add-task');
})->middleware('auth');
Route::get('delete-task/{id}', [TaskController::class, 'destroy'])->name('task.delete')->middleware('auth');

Route::get('task-statut/{id}/{statut}', [TaskController::class, 'statut'])->name('task.statut')->middleware('auth');



Route::get('edit-task/{id}', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth');
Route::post('update-task/{id}', [TaskController::class, 'update'])->name('task.update')->middleware('auth');
