<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Livewire\TaskView;
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

/******************LOGIN PAGE ROUTES START****************/
Route::view('/','auth.login');
Route::post('login',[AuthController::class,'login'])->name('login');

/******************LOGIN PAGE ROUTES END****************/
/******************MIDDLEWARE PAGES ROUTES START****************/
Route::group(['middleware' => 'auth:user'], function () { 
    /*******************DASHBOARD ROUTE START*************/       
    Route::view('dashboard','dashboard.index')->name('dashboard.index');
    /*******************DASHBOARD ROUTE END*************/       
    /*******************LOGOUT ROUTE START*************/       
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    /*******************LOGOUT ROUTE END*************/       
    /*******************TASK ROUTE START*************/   
    Route::get('today_tasks',TaskView::class)->name('task.today');  
    // Route::get('task/mark_pending/{id}', [TaskController::class,'markPending'])->name('task.mark_pending');  
    // Route::get('task/mark_complete/{id}', [TaskController::class,'markComplete'])->name('task.mark_complete');  
    Route::resource('task', TaskController::class);  
    /*******************TASK ROUTE END*************/   
});
/******************MIDDLEWARE PAGES ROUTES END****************/