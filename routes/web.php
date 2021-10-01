<?php

use App\Http\Controllers\ChangPasswordController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContCategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DeviseController;
use App\Http\Controllers\EtatConteneurController;
use App\Http\Controllers\MasterFilesController;
use App\Http\Controllers\MaterielsController;
use App\Http\Controllers\MonnaieController;
use App\Http\Controllers\MouvementsController;
use App\Http\Controllers\NaviresController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\ReparationsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\SousSiteController;
use App\Http\Controllers\SurestarieController;
use App\Http\Controllers\TauxesController;
use App\Http\Controllers\TypedeConteneursController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users',UserController::class); 
Route::resource('etatdeConteneurs',EtatConteneurController::class);
Route::resource('devises',DeviseController::class);
Route::resource('sites',SiteController::class);
Route::resource('pays',PaysController::class);
Route::resource('countries',CountryController::class);
Route::resource('tauxes',TauxesController::class);
Route::resource('rates',RatesController::class);
Route::resource('ports',PortController::class);
Route::resource('clients',ClientsController::class);
Route::resource('materiels',MaterielsController::class);
Route::resource('owners',OwnersController::class);
Route::resource('sizes',SizesController::class);
Route::resource('navires',NaviresController::class);
Route::resource('sous_sites',SousSiteController::class);
Route::resource('masterfiles',MasterFilesController::class);
Route::resource('mouvements',MouvementsController::class);
Route::resource('reparations',ReparationsController::class);
Route::resource('types',TypesController::class);
Route::resource('contcategories',ContCategoriesController::class);
Route::resource('surestaries',SurestarieController::class);
// Route::resource('layouts',UserController::class);
Route::post('users/{user}/change_password',[ChangPasswordController::class,'change_password'])->name('users.change.password');
