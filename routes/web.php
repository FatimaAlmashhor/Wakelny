<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\client\ControllPannelController;
use App\Http\Controllers\client\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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


//start email verify
Route::get('/verify_email/{token}', [AuthController::class, 'verifyEmail'])->name('verify_email');
//  end email verify


// ------------------------------------------------------------------------
// reset password
// ------------------------------------------------------------------------

Route::get('/forget-password',  [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-pass');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('update-password');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    // ------------------------------------------------------------------------
    // Static pages section
    // ------------------------------------------------------------------------
    Route::view('/', 'client.static.home')->name('home');
    Route::view('/aboutUs', 'client.static.about_us')->name('aboutus');
    Route::view('/contactUs', 'client.static.contactUs')->name('contactus');

    // this is the page of the freelancers
    Route::get('/freelancers', [UserController::class, 'index'])->name('freelancers');
    // this is the subsection of howen the freelncers 
    Route::post('/freelancers_filter', [UserController::class, 'filter'])->name('freelancers.filter');

    Route::get('/user-profile/{user_id}', [UserController::class, 'showUserProfile'])->name('userProfile');
    Route::view('/editUserProfile', 'client.userProfile.editUserProfile')->name('editUserProfile');
    Route::view('/projectlancer', 'client.user.projectlancer')->name('projectlancer');





    // ------------------------------------------------------------------------
    // Admin section
    // ------------------------------------------------------------------------

    Route::get('/users', [AuthController::class, 'listAll'])->name('users');

    Route::get('/createUser', [AuthController::class, 'create'])->name('create_user');
    Route::post('/createUser', [AuthController::class, 'register'])->name('save_user'); //save_user

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do_login'); //do_login
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



    // check if the user is login in
    Route::group(['middleware' => ['auth', 'role:provider|seeker']], function () {
        // the authization of the user controllpanalle
        Route::get('/controllPannal', [ControllPannelController::class, 'index'])->name('profile');

        //    shoud verfid the email
        Route::group(['middleware' =>  'verified'], function () {

            // use profile skills section
            Route::prefix('/skills')->group(function () {
                Route::get('/', [ProfileController::class, 'showSkills'])->name('skills');
                Route::post('/edit', [ProfileController::class, 'saveSkills'])->name('editSkills');
                Route::get('/delete/{skill_id}', [ProfileController::class, 'deleteSkill'])->name('deleteSkill');
            });

            Route::get('/user-account', [ControllPannelController::class, 'edit_pro'])->name('account');
            Route::post('/account-update', [ControllPannelController::class, 'account_save'])->name('account_save');


            Route::get('/profile', [ProfileController::class, 'edit_profile'])->name('profile');
            Route::post('/profile-update', [ProfileController::class, 'profile_save'])->name('profile_save');
        });
    });
    // ------------------------------------------------------------------------
    // Admin section
    // ------------------------------------------------------------------------

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admin', [ControllPannelController::class, 'admin'])->name('admin');
        //////////////////////CRUD skills ////////////////
        Route::get('/list_skills', [SkillController::class, 'list_skills'])->name("list_skills");
        Route::get('/add_skill', [SkillController::class, 'add_skill'])->name('add_skill');
        Route::post('/add_skill', [SkillController::class, 'store'])->name('save_skill');
        Route::get('/edit_skill/{skill_id}', [SkillController::class, 'edit'])->name('edit_skill');
        Route::post('/edit_skill/{skill_id}', [SkillController::class, 'update'])->name('update_skill');
        Route::get('/toggle_skill/{skill_id}', [SkillController::class, 'toggle'])->name('toggle_skill');

        //////////////////////CRUD category ////////////////
        Route::get('/list_categories', [CategoriesController::class, 'list_category'])->name('list_categories');
        Route::get('/add_category', [CategoriesController::class, 'add_category'])->name('add_category');
        Route::post('/add_category', [CategoriesController::class, 'store'])->name('save_category');
        Route::get('/edit_category/{cat_id}', [CategoriesController::class, 'edit'])->name('edit_category');
        Route::post('/edit_category/{cat_id}', [CategoriesController::class, 'update'])->name('update_category');
        Route::get('/toggle_category/{cat_id}', [CategoriesController::class, 'toggle'])->name('toggle_category');
    });
});

//  start email verify
Route::get('/verify_email/{token}', [AuthController::class, 'verifyEmail'])->name('verify_email');
//  end email verify