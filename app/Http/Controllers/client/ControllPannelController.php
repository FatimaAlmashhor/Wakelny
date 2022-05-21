<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Models\Posts;
use App\Models\Profile;
use App\Models\UserSkills;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Models\Wallet as ModelsWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ControllPannelController extends Controller
{
    //here the defualt function

    function index()
    {
        // give all the categories
        $categories = category::where('is_active', 1)->get();

        $profile = Profile::where('user_id', Auth::id())->get();

        // give the roles of the user
        $user = User::find(Auth::id());
        $userRole = 'seeker';
        if ($user->hasRole('provider') && $user->hasRole('seeker')) {
            $userRole = 'both';
        } else if ($user->hasRole('provider')) {
            $userRole = 'provider';
        }
       
        // return response()->json($transactions);
        return view('client.userProfile.controllPannal')->with([
            'data' => $profile,
            'categories' =>  $categories,
            'role' => $userRole,
           
        ]);
        // return view('client.userProfile.controllPannal')->with();
    }

    // here the function for the saving the user information
    public function profile_save(Request $request)
    {
        $current_user_id = Auth::user()->id;

        $userRole = false;
        // Auth::user()->roles()->detach();


        if ($request->provider && $request->seeker) {
            Auth::user()->roles()->sync([3, 4]);
            $userRole = true;
        } else if ($request->provider) {
            Auth::user()->roles()->sync([4]);
            $userRole = true;
        } else if ($request->seeker) {
            Auth::user()->roles()->sync([3]);
            $userRole = true;
        } else {
            $userRole = false;
        }


        if ($userRole) {
            Profile::where('user_id', $current_user_id)->update(
                [
                    // !what this for?
                    'job_title' => $request->input('job_title'),
                    'specialization'  =>  $request->input('category_id'),
                    'bio'  =>  $request->input('bio'),
                    'video'  =>  $request->input('video'),
                    'category_id' => $request->input('category_id'),
                    'hire_me' => $request->hire_me ? 1 : 0
                ]

            );
            return redirect()->route('profile')
                ->with(['message' => '   تم تعديل معلومات الشخصيه بنجاح', 'type' => 'alert-success']);
        } else {
            return redirect()->back()
                ->with(['message' => 'يرجى تحديد نوع الحساب رجاء', 'type' => 'alert-danger']);
        }
    }


    function admin()
    {
        // Show account Users && Posts && Rports
        $post = DB::table('posts')->count();
        $reports = DB::table('reports')->count();
        $cates = DB::table('categories')->count();
        $user = DB::table('users')->count();

        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))

            ->whereYear('created_at', date('Y'))

            ->groupBy(DB::raw("MONTHNAME(created_at)"))

            ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();

        return view('admin.index', compact('labels', 'data', 'user', 'reports', 'cates', 'post'));
    }

    public function edit_pro()
    {
        $current_user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $current_user_id)->get();
        //  print_r($profile);
        return view('client.userProfile.editUserProfile')
            ->with('data', $profile);
    }


    public function uploadFile($file)
    {
        $dest = public_path() . "/images/";

        //$file = $request->file('image');

        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($dest, $filename);

        return $filename;
    }

    public function account_save(Request $request)
    {

        $current_user_id = Auth::user()->id;
        // User::where('id', $current_user_id)->update(['name' => $request->input('name')]);

        // $filename = $this->uploadFile($request->file('avatar'));

        // $ser->image=$this->uploadFile($request->file('image'));
        // Profile::where('user_id', $current_user_id)->update(
        //     [
        //         'name' => $request->input('name'),
        //         'gender'    =>  $request->input('gender'),
        //         'country'  =>  $request->input('country'),
        //         'mobile'  =>  $request->input('mobile'),
        //         'avatar' => $filename,
        //     ]

        // );
        Validator::validate($request->all(), [
            'name' => 'required|min:8',
            'gender' => 'required',
            'country' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ], [
            'name.required' => 'ادخل الاسم',
            'name.min' => 'يجب ان يكون الاسم اكثر من 8حروف',
            'gender.required' => ' هذا الحقل مطلوب',
            'country.required' => 'ادخل الدولة',
            'avatar.required' => 'اظف صورة',
            'avatar.image' => 'الصيغة غير صحيحة',
            'avatar.mimes' => 'نوع الصورة يجب ان يكون jpgاوpngاوjpegاوgifاوsvg',
            'mobile.required' => 'ادخل رقم الهاتف',
            'mobile.regex' => ' ادخل  صيغة رقم صحيح ',
            'mobile.min' => ' يجب ان يكون الرقم اكبر 8 ارقام ',


        ]);
        $pro = Profile::where('user_id', $current_user_id)->first();
        $pro->name = $request->name;
        $pro->gender = $request->gender;
        $pro->country = $request->country;
        $pro->mobile = $request->mobile;


        if ($request->hasFile('avatar'))
            $pro->avatar = $this->uploadFile($request->file('avatar'));
        else {
        }
        if ($pro->save())

            return redirect()->route('account')->with(['message' => 'تم تعديل بياناتك الشخصيه بنجاح', 'type' => 'alert-success']);
    }
}