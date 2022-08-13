<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [PageController::class, 'main_page']);
Route::get('/newclient', [PageController::class, 'form_page']);
Route::get('/client_detail', [PageController::class, 'detail_page']);

Route::get('/delete_car', [ClientController::class, 'delete_car']);
Route::post('/addNewclient', [ClientController::class, 'new_client']);
Route::post('/user_update', [ClientController::class, 'update_user']);
Route::post('/update_cars', [ClientController::class, 'update_car']);

