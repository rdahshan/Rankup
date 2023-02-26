<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\API\SlotController as APISlotController;
use App\Http\Controllers\SlotController;
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

Route::prefix('admin')->as('admin.')->group(function(){
    Route::resource('devices', DeviceController::class);
    Route::resource('slots', SlotController::class);
    Route::get('slot_by_device/{device}',[APISlotController::class,'get_slots_by_device'])->name('slot_by_device');
    Route::resource('participants', ParticipantController::class);
});