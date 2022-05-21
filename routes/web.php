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
use App\Http\Controllers\admin\projectAdminController;
use App\Http\Controllers\admin\projects;
use App\Http\Controllers\admin\settingUserController;
use App\Http\Controllers\client\CommentsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\settingPaymentController;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\client\ControllPannelController;
use App\Http\Controllers\client\MyWorkOnProjectController;
use Illuminate\Support\Facades\Http;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\client\ChatController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\payment\PaymentController;
use App\Models\Project;
use App\Models\User;
use Pusher\Pusher;

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
    //  mywallet view

    Route::get('/mywallet', [ProfileController::class, 'showMyWallet'])->name('mywallet');

    //
    // ------------------------------------------------------------------------
    // Static pages section
    // ------------------------------------------------------------------------
    Route::view('/', 'client.static.home')->name('home');
    Route::view('/aboutUs', 'client.static.about_us')->name('aboutUs');
    // Route::view('/contactUs', 'client.static.contactUs')->name('contactUs');
    Route::get('/contactUs', [ContactController::class, 'index'])->name('contactUs');
    Route::post('/contactUs', [ContactController::class, 'store'])->name('contact.us.store');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');

    // this is the page of the freelancers
    Route::get('/freelancers', [UserController::class, 'index'])->name('freelancers');
    // this is the subsection of howen the freelncers
    Route::post('/freelancers_filter', [UserController::class, 'filter'])->name('freelancers.filter');

    Route::get('/user-profile/{user_id}', [UserController::class, 'showUserProfile'])->name('userProfile');
    Route::view('/editUserProfile', 'client.userProfile.editUserProfile')->name('editUserProfile');

    // post router
    Route::get('/posts', [PostController::class, 'showAll'])->name('projectlancer');
    Route::get('/posts/details/{post_id}', [PostController::class, 'showOne'])->name('posts.details');



    Route::get('/users', [AuthController::class, 'listAll'])->name('users');

    Route::get('/createUser', [AuthController::class, 'create'])->name('create_user');
    Route::post('/createUser', [AuthController::class, 'register'])->name('save_user'); //save_user

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do_login'); //do_login
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // login with google
    Route::get('/google', [GoogleController::class, 'redirectToGoogle'])->name('loginWithGoogle');
    Route::any('/google/callback', [GoogleController::class, 'handleGoogleCallback']);



    // -------------------------------------------------------------------------
    // user registerd and vaild
    // -------------------------------------------------------------------------

    // check if the user is login in
    Route::group(['middleware' => ['auth', 'role:provider|seeker']], function () {








        // ----------------------------------------------------------------
        // user must be vaild
        // ----------------------------------------------------------------
        //shoud verfid the email
        Route::group(['middleware' =>  ['verified', 'isUser']], function () {
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

            // this is the page of the my_works
            Route::get('/myWorks', [WorksController::class, 'index'])->name('myWorks');
            Route::get('/userWork', [WorksController::class, 'create'])->name('userWork');

            Route::post('/saveUserWork', [WorksController::class, 'store'])->name('works.saveUserWork');
            Route::get('/detailsWork/{work_id}', [WorksController::class, 'showDetails'])->name('detailsWork');
            Route::get('/edit_work/{work_id}', [WorksController::class, 'edit'])->name('edit_work');
            Route::post('/edit_work/{work_id}', [WorksController::class, 'update'])->name('update_work');
            Route::get('/toggle_work/{work_id}', [WorksController::class, 'toggle'])->name('toggle_work');
            // --------end post routing

            //--------- start comment
            // this route for save new comment
            Route::post('/comment/add', [CommentsController::class, 'save'])->name('comment.add');
            //--------  end comment


            // this is the page of the report
            Route::get('/report_content/{post_id}/{provider_id}', [UserController::class, 'insert_content'])->name('report_content');
            Route::get('/report_provider/{provider_id}', [UserController::class, 'insert_user'])->name('report_provider');
            Route::post('/saveReport', [ReportController::class, 'store'])->name('saveReport');

            // edit comment
            Route::get('/editcomment/{comment_id}', [CommentsController::class, 'editComment'])->name('editComment');
            Route::post('/update_comment/{comment_id}', [CommentsController::class, 'update'])->name('update_comment');



            // Route::get('/postDescribtion', [PostController::class, 'postDesciption'])->name('postDesciption');
            Route::get('/myProject', [PostController::class, 'showProject'])->name('myProject');
            Route::get('/editpost/{post_id}', [PostController::class, 'editPosts'])->name('editPosts');
            Route::post('/update_post/{post_id}', [PostController::class, 'update'])->name('update_post');
            Route::get('/toggle_post/{post_id}', [PostController::class, 'toggle'])->name('toggle_post');


            // Accept Offer
            Route::get('/accept-offer', [ProjectController::class, 'acceptOffer'])->name('accept-offer');
            // Route::get('/confirm-offer', [ProjectController::class, 'showProviderConfirmation'])->name('provider-confirmation');
            Route::post('/confirm-offer/{offer_id}', [ProjectController::class, 'providerResponse'])->name('provider-confirm');
            Route::get('/confirm-project/{project_id}/{seeker_id}', [ProjectController::class, 'confirmProject'])->name('confirm-project');
            Route::get('/accept-project/{project_id}/{seeker_id}', [ProjectController::class, 'acceptProject'])->name('AcceptProject');
            Route::get('/reject-project/{project_id}/{seeker_id}', [ProjectController::class, 'rejectProject'])->name('rejectProject');


            // the project that provider work on
            Route::get('/myWorkOnProject', [MyWorkOnProjectController::class, 'index'])->name('workonProject');
            Route::get('/myWorkOnProject/done', [MyWorkOnProjectController::class, 'doneWork'])->name('doneWork');
            Route::post('/mark_as_done', [MyWorkOnProjectController::class, 'markAsDone'])->name('markAsDone');
            Route::get('/confirm-receive/{project_id}/{provider_id}', [MyWorkOnProjectController::class, 'markAsRecive'])->name('markAsRecive');
            Route::post('/accept-receive', [MyWorkOnProjectController::class, 'markAsAccept'])->name('markAsAccept');
            Route::post('/reject-receive', [MyWorkOnProjectController::class, 'markAsReject'])->name('markAsReject');


            // !report fatima vertion
            Route::post('/reporting', [ReportController::class, 'reporting'])->name('reporting');

            // continue the project after rejection
            Route::get('/continueProject/{project_id}', [MyWorkOnProjectController::class, 'markAsContinue'])->name('continueProject');
        });
    });

    ////////////////////////////inbox //////////////////
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/inbox', [ChatController::class, 'index'])->name('inbox.index');
        Route::get('/inbox/{id}', [ChatController::class, 'show'])->name('inbox.show');
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
        /////////////////////////////////////////////////////////////////////////////////////////////////

        Route::get('/reports', [ReportController::class, 'showAll'])->name('reports');
        Route::get('/reports/details/{project_id}', [ReportController::class, 'reportDetails'])->name('report.details');
        Route::get('/toggle_report/{report_id}', [ReportController::class, 'toggle'])->name('toggle_report');

        ///////////////----------------------ProjectAdmin----------------------------------------------------------//////

        Route::get('/projects', [projectAdminController::class, 'showAll'])->name('projects');
        // Route::get('/toggle_report/{report_id}', [projectAdminController::class, 'toggle'])->name('toggle_report');
        /////////////////---------------------------------------------------------------------------//////////////////////
        // start active & block users
        Route::get('/showUsers', [settingUserController::class, 'show'])->name("showUsers");
        //end active & block users

        // start change password
        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
        Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update-password');
        // end change password

        // payment
    });
    Route::get('/do-payment/{project_id}/{seeker_id}', [PaymentController::class, 'doPayment'])->name('payment.do');
    Route::get('/success-payment/{project_id}/{response}', [PaymentController::class, 'successPayment'])->name('payment.success');
    Route::get('/cancel-payment/{project_id}/{response}', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
    Route::get('/get-money-back/{project_id}', [PaymentController::class, 'sendTheMoneyBack'])->name('payment.sendMoenyBack');
    Route::get('/get-money-back/{project_id}', [PaymentController::class, 'sendTheMoneyBackTo'])->name('payment.sendMoenyBackTo');
    // Route::get('/back-payment-to-seeker/{project_id}', [PaymentController::class, 'sendTheMoneyToSeeker'])->name('payment.sendToSeeker');
});


Route::view('/test-suc', 'client.payAnimation.paySucces');

// ------------------------------------------------------------------------
// Admin Block UnBlock- Users
// ------------------------------------------------------------------------



// !!| here just for test
// make the notification as red
Route::get('/markAsRead', function () {

    auth()->user()->unreadNotifications->markAsRead();

    return redirect()->back();
})->name('mark');


Route::get('/markAsRead/{notification}', function ($notification) {
    $mark = Auth()->user()->unreadNotifications->where('id', $notification)->first();

    $mark->update(['read' => true]);
})->name('markAsReadOne');


// test API
Route::get('/testApi', function () {

    $data = [
        "id" => 1,
        "product_name" => "sumsung s5",
        "quantity" => 1,
        "unit_amount" => 100
    ];

    $response = Http::withHeaders([
        'private-key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',
        'public-key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',
        'Content-Type' => 'application/x-www-form-url'
    ])->post('https://waslpayment.com/api/test/merchant/payment_order', [
        'order_reference' => '123412',
        'products' =>  [$data],
        'total_amount' => '133',
        'currency' => 'YER',
        'success_url' => '/',
        'cancel_url' => '/logout',
        'metadata' => ' { "Customer name": "somename", "order id": 0}'
    ]);

    return response()->json($response->status());
    // <!-- return redirect($response['next_url']); -->
});


Route::get('/testWallet', function () {
    $admin = User::find(1);
    $user = User::find(10);
    $project = Project::find(1);
    $admin->deposit(5000, [
        'provider' => $user,
        'project ' => $project
    ]);
    // $user->deposit(10);

    return $admin->balance; // 10
});

Route::get('/test-pusher', function () {
    $options = array(
        'cluster' => env('PUSHER_APP_CLUSTER'),
        'encrypted' => true
    );
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );


    $data['title'] = 'تم اضافه مشروع ';
    $data['price'] =  888;

    $pusher->trigger('channel-name', 'App\\Events\\StatusLiked', $data);

    return view('testPusher');
});