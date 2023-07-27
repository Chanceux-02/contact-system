<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\GetController;
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

// Route::get('/', function () {
//     return view('index');
// })->name('contacts');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/thankyou', function () {
    return view('pages.thankyou');
});
Route::get('/addContact', function () {
    return view('pages.addContact');
})->name('add-contacts');
Route::get('/editContact', function () {
    return view('pages.editContacts');
});


// I use withoutMiddleware, middleware to disable the csrf for testing it in postman. Just remove it after.

Route::get('/', [GetController::class, 'contactList'])->name('contacts')->middleware('auth');

Route::get('/edit-contact/{id}', [GetController::class, 'contactData'])->name('edit-contact');
Route::get('/delete-contact/{id}', [GetController::class, 'delete'])->name('delete-contact');

Route::post('/searchResult', [GetController::class, 'search'])->name('search-results');
Route::post('/edit-contact', [GetController::class, 'editContactData'])->name('edit-contacts');
Route::post('/register', [CreateController::class, 'register'])->name('register');
Route::post('/add-contact', [CreateController::class, 'addContact'])->name('add-contact');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

