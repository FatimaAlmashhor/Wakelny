<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\client\PostController;
use App\Http\Controllers\client\WorksController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\client\CommentController;
use App\Http\Controllers\client\ProfileController;
use App\Http\Controllers\client\ProjectController;
use App\Http\Controllers\client\CommentsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\settingUserController;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\client\ControllPannelController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



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


Route::get('/verify-email', [AuthController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');


Route::post('/verify-email/request', [AuthController::class, 'request'])
    ->middleware('auth')
    ->name('verification.request');


Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verify'])
    ->middleware(['auth', 'signed']) // <-- don't remove "signed"
    ->name('verification.verify'); // <-- don't change the route name
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

// post router
    Route::get('/posts', [PostController::class, 'showAll'])->name('projectlancer');
    Route::get('/posts/details/{post_id}', [PostController::class, 'showOne'])->name('posts.details');
    Route::get('/editpost/{post_id}', [PostController::class, 'editPosts'])->name('editPosts');
    // Route::get('/postDescribtion', [PostController::class, 'postDesciption'])->name('postDesciption');
    Route::get('/myProject', [PostController::class, 'showProject'])->name('myProject');
	Route::post('/update_post/{post_id}',[PostController::class,'update'])->name('update_post');
	Route::get('/toggle_post/{post_id}',[PostController::class,'toggle'])->name('toggle_post');


    // Accept Offer
    Route::get('/accept-offer', [ProjectController::class, 'acceptOffer'])->name('accept-offer');
    // Route::get('/confirm-offer', [ProjectController::class, 'showProviderConfirmation'])->name('provider-confirmation');
    Route::post('/confirm-offer/{offer_id}', [ProjectController::class, 'providerResponse'])->name('provider-confirm');

// //////////////////


    // this is the page of the my_works
    Route::get('/myWorks', [WorksController::class, 'index'])->name('myWorks');
    Route::get('/userWork', [WorksController::class, 'create'])->name('userWork');

    Route::post('/saveUserWork', [WorksController::class,'store'])->name('works.saveUserWork');
    Route::get('/detailsWork/{work_id}', [WorksController::class, 'showDetails'])->name('detailsWork');
    Route::get('/edit_work/{work_id}', [WorksController::class, 'edit'])->name('edit_work');
    Route::post('/edit_work/{work_id}', [WorksController::class, 'update'])->name('update_work');
    Route::get('/toggle_work/{work_id}', [WorksController::class, 'toggle'])->name('toggle_work');
    // this is the subsection of howen the my_works

    // Route::post('/myWorks_filter', [UserController::class, 'filter'])->name('myWorks.filter');


    // ------------------------------------------------------------------------
    // Admin section
    // ------------------------------------------------------------------------

    Route::get('/users', [AuthController::class, 'listAll'])->name('users');

    Route::get('/createUser', [AuthController::class, 'create'])->name('create_user');
    Route::post('/createUser', [AuthController::class, 'register'])->name('save_user'); //save_user

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do_login'); //do_login
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // login with google
    Route::get('/google', [GoogleController::class, 'redirectToGoogle'])->name('loginWithGoogle');
    Route::any('/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    // // start change password
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password');
    // // end change password

    // check if the user is login in
    Route::group(['middleware' => ['auth', 'role:provider|seeker']], function () {

        //    shoud verfid the email
      Route::group(['middleware' =>  ['verified','isUser'] ], function () {
            // the authization of the user controllpanalle
            Route::get('/controllPannal', [ControllPannelController::class, 'index'])->name('profile');

            Route::post('/profile-update', [ControllPannelController::class, 'profile_save'])->name('profile_save');
            // use profile skills section
            Route::prefix('/skills')->group(function () {
                Route::get('/', [ProfileController::class, 'showSkills'])->name('skills');
                Route::post('/edit', [ProfileController::class, 'saveSkills'])->name('editSkills');
                Route::get('/delete/{skill_id}', [ProfileController::class, 'deleteSkill'])->name('deleteSkill');
            });

            Route::get('/user-account', [ControllPannelController::class, 'edit_pro'])->name('account');
            Route::post('/account-update', [ControllPannelController::class, 'account_save'])->name('account_save');

            //--------  start post form routing

            // this route for the show the post form
            Route::get('/post', [PostController::class, 'index'])->name('post');

            // this route for save new post
            Route::post('/post/save', [PostController::class, 'save'])->name('savePost');

            // --------end post routing

            //--------- start comment
            // this route for save new comment
            Route::post('/comment/add', [CommentsController::class, 'save'])->name('comment.add');
                        //--------  end comment
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

/////////     Admit can Block && unBlock User            ///////////////////////
Route::get('/add_userBlock', [settingUserController::class, 'store'])->name('add_user');
        Route::get('/edit_user/{user_id}', [settingUserController::class, 'edit'])->name('edit_user');
        Route::get('/ban_user/{user_id}', [settingUserController::class, 'ban'])->name('ban_user');


        Route::post('/edit_skill/{skill_id}', [SkillController::class, 'update'])->name('update_skill');
        Route::get('/toggle_skill/{skill_id}', [SkillController::class, 'toggle'])->name('toggle_skill');

        //////////////////////CRUD category ////////////////
        Route::get('/list_categories', [CategoriesController::class, 'list_category'])->name('list_categories');
        Route::get('/add_category', [CategoriesController::class, 'add_category'])->name('add_category');
        Route::post('/add_category', [CategoriesController::class, 'store'])->name('save_category');
        Route::get('/edit_category/{cat_id}', [CategoriesController::class, 'edit'])->name('edit_category');
        Route::post('/edit_category/{cat_id}', [CategoriesController::class, 'update'])->name('update_category');
        Route::get('/toggle_category/{cat_id}', [CategoriesController::class, 'toggle'])->name('toggle_category');

          //////////////////////CRUD Specialization ////////////////
          Route::get('/list_specialization', [SpecializationController::class, 'list_specialization'])->name('list_specialization');
          Route::get('/add_specialization', [SpecializationController::class, 'add_specialization'])->name('add_specialization');
          Route::post('/add_specialization', [SpecializationController::class, 'store'])->name('save_specialization');
          Route::get('/edit_specialization/{cat_id}', [SpecializationController::class, 'edit'])->name('edit_specialization');
          Route::post('/edit_specialization/{cat_id}', [SpecializationController::class, 'update'])->name('update_specialization');
          Route::get('/toggle_specialization/{cat_id}', [SpecializationController::class, 'toggle'])->name('toggle_specialization');
    });
});

 // ------------------------------------------------------------------------
    // Admin Block UnBlock- Users
    // ------------------------------------------------------------------------


// Route::group(['middleware' => [ 'auth','isUser']], function () {
//     // the authization of the user controllpanalle
//     Route::get('/controllPannal', [ControllPannelController::class, 'index'])->name('profile');
// });

// start active & block users
Route::get('/showUsers', [settingUserController::class, 'show'])->name("showUsers");
//end active & block users

Route::view('/pusher', 'testPusher')->name('pusher');
Route::get('test', function () {
	event(new App\Events\StatusLiked('Someone'));
	return "Event has been sent!";
});

// start active & block users
Route::get('/showUsers', [settingUserController::class, 'show'])->name("showUsers");
//end active & block users


// edit comment
Route::get('/editcomment/{comment_id}', [CommentsController::class, 'editComment'])->name('editComment');
	Route::post('/update_comment/{comment_id}',[CommentsController::class,'update'])->name('update_comment');

//

