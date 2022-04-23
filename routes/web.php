<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\client\ControllPannelController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\ResetPasswordController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



//start  roles managment
Route::get('/generate_roles', [SettingsController::class, 'generateRoles'])->name('generate_roles');
//end roles managment

//start email verify
Route::get('/verify_email/{token}', [AuthController::class, 'verifyEmail'])->name('verify_email');
//  end email verify

Route::get('/users', [AuthController::class, 'listAll'])->name('users');
Route::get('/createUser', [AuthController::class, 'create'])->name('create_user');

Route::post('/save_user', [AuthController::class, 'register'])->name('save_user');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/do_login', [AuthController::class, 'login'])->name('do_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// ------------------------------------------------------------------------
// reset password
// ------------------------------------------------------------------------

Route::get('/forget-password',  [ForgotPasswordController::class, 'getEmail']);
Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword']);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    // ------------------------------------------------------------------------
    // Client section
    // ------------------------------------------------------------------------
    Route::get('/', [ControllPannelController::class, 'index'])->name('home');
    Route::view('/aboutUs', 'client.static.about_us');
    Route::view('/contactUs', 'client.static.contactUs');
    Route::view('/freelancers', 'client.user.freelancers');
    Route::view('/user-profile', 'client.userProfile.userProfile');

    Route::view('/profile', 'client.userProfile.profile');

    // Route::view('/user-prof', 'client.userProfile.user_profile');



    // ------------------------------------------------------------------------
    // Admin section
    // ------------------------------------------------------------------------

    Route::get('/users', [AuthController::class, 'listAll'])->name('users');
    Route::get('/create_user', [AuthController::class, 'create'])->name('create_user');
    Route::post('/save_user', [AuthController::class, 'register'])->name('save_user');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/do_login', [AuthController::class, 'login'])->name('do_login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    // check if the user is login in
    Route::group(['middleware' => ['auth', 'role:provider|seeker']], function () {

        Route::view('/user-profile', 'client.userProfile.userProfile')->name('userProfile');
        //    shoud verfid the email
        Route::group(['middleware' =>  'verified'], function () {

            // use profile skills section
            Route::prefix('/skills')->group(function () {
                Route::get('/', [ControllPannelController::class, 'showSkills'])->name('skills');
                Route::post('/edit', [ControllPannelController::class, 'saveSkills'])->name('editSkills');
                Route::get('/delete/{skill_id}', [ControllPannelController::class, 'deleteSkill'])->name('deleteSkill');
            });
            Route::get('/user-account', [ControllPannelController::class, 'edit_pro'])->name('account');

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
        Route::post('/save_skill', [SkillController::class, 'store'])->name('save_skill');
        Route::get('/edit_skill/{skill_id}', [SkillController::class, 'edit'])->name('edit_skill');
        Route::get('/toggle_skill/{skill_id}', [SkillController::class, 'toggle'])->name('toggle_skill');
        Route::post('/update_skill/{skill_id}', [SkillController::class, 'update'])->name('update_skill');

        //////////////////////CRUD category ////////////////
        Route::get('/list_categories', [CategoriesController::class, 'list_category'])->name('list_categories');
        Route::get('/add_category', [CategoriesController::class, 'add_category'])->name('add_category');
        Route::get('/edit_category/{cat_id}', [CategoriesController::class, 'edit'])->name('edit_category');
        Route::get('/toggle_category/{cat_id}', [CategoriesController::class, 'toggle'])->name('toggle_category');
        Route::post('/save_category', [CategoriesController::class, 'store'])->name('save_category');
        Route::post('/update_category/{cat_id}', [CategoriesController::class, 'update'])->name('update_category');
    });
});
