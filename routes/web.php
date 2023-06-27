<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
////    Route::get('/dashboard', function () {
////        return view('dashboard');
////    })->name('dashboard');
//
//
//});

//For USR
Route::middleware(['auth:sanctum','verified'])->group(function(){
//        Route::get('/user/dashboard',\App\Http\Livewire\User\UserDashboardComponent::class)->name('userdashboard');

});

//For ADM ,'accessrole'
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/',\App\Http\Livewire\DashboardComponent::class)->name('dashboard');
    Route::get('/users',\App\Http\Livewire\Users\MainPageComponent::class)->name('users');
    Route::get('/usrprmsn',\App\Http\Livewire\Users\Permission\MainPageComponent::class)->name('userpermission');
    Route::get('/province',\App\Http\Livewire\Province\MainPageComponent::class)->name('cities');
    Route::get('/charts/{id?}',\App\Http\Livewire\Charts\HomeMissionOneChartsComponent::class)->name('charts');
});
