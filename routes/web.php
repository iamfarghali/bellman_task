<?php

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

use Illuminate\Support\Facades\Route;


Route::get( '/', function () {
    return view( 'welcome' );
} );
Route::get('/locale/{locale}', function ($locale) {
   session()->put('locale', $locale);
   return redirect()->back();
});

Route::resource( 'companies', 'CompanyController' );
Route::resource( 'employees', 'EmployeeController' );
Auth::routes( [
    'register' => false,
    'reset'    => false,
    'verify'   => false,
] );
Route::get( 'dashboard', 'DashboardController' )->middleware( 'auth' );







