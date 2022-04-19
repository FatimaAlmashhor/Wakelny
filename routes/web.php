<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\client\ControllPannelController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\SkillController;

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

// Route::get('/', function () {
//     return view('welcome');
// });







// ------------------------------------------------------------------------
// Client section
// ------------------------------------------------------------------------
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::view('/', 'client.static.home');
    Route::view('/aboutUs', 'client.static.about_us');
    Route::view('/contactUs', 'client.static.contactUs');
    
Route::get('/users',[AuthController::class,'listAll'])->name('users');
Route::get('/create_user',[AuthController::class,'create'])->name('create_user');
Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');

//////////////////////CRUD skills ////////////////
Route::get('/skills',[SkillController::class,'listAll'])->name("skills");
Route::get('/create_skill',[SkillController::class,'create'])->name('create_skill');
Route::post('/save_skill',[SkillController::class,'store'])->name('save_skill');
Route::get('/edit_skill/{skill_id}',[SkillController::class,'edit'])->name('edit_skill');
Route::get('/toggle_skill/{skill_id}',[SkillController::class,'toggle'])->name('toggle_skill');
Route::post('/update_skill/{skill_id}',[SkillController::class,'update'])->name('update_skill');
});






// ------------------------------------------------------------------------
// Admin section
// ------------------------------------------------------------------------

//start  roles managment
Route::get('/generate_roles', [SettingsController::class, 'generateRoles'])->name('generate_roles');
//end roles managment
