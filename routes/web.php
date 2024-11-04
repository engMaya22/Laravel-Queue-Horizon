<?php

use App\Jobs\SendEmailJob;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dispatch-high-jobs', function() {
    $email = 'eng.maya.esmaeel1@gmail.com';
    for ($i = 0; $i < 100; $i++) { 
        SendEmailJob::dispatch($email)->onQueue('high');
    }
    return 'High-priority jobs dispatched!';
});

Route::get('/dispatch-low-jobs', function() {
    $email = 'eng.maya.esmaeel1@gmail.com';
    for ($i = 0; $i < 100; $i++) { 
        SendEmailJob::dispatch($email)->onQueue('low');
    }
    return 'Low-priority jobs dispatched!';
});