<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use App\Models\category;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use App\Models\Posts;
use App\Models\Report;
use App\Models\UserSkills;
use App\Utilities\FreelancerFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class UserController extends Controller
{




    function index(Request $request)
    {

        $providers = User::getProviders('', GlobalConstants::ALL, GlobalConstants::ALL);

        /**
         * ! why the model in the small?
         */

        $cates = category::where('is_active', 1)->get();
        $skill = Skill::where('is_active', 1)->get();

        $reports = Report::get();


        // $filter = QueryBuilder::for(Profile::class)
        //     ->allowedFilters([
        //         'name',
        //         'rating',
        //         'specialization',
        //         AllowedFilter::callback('role', function (Builder $query, $value) {
        //             $query->join('role_user', 'role_user.user_id', '=', 'profiles.user_id')
        //                 ->where('role_user.role_id', 4);
        //         }),
        //     ])
        //     ->get();


        return view('client.user.freelancers')->with(['data' => $providers, 'cates' => $cates,  'skills' => $skill, 'reports' => $reports]);
    }


    function filter(Request $request)
    {
        // other try

        $query = $request->search_query;
        $cate = $request->cates;
        $skills = $request->skills;
        $posts = $request->posts;
        $users = $request->users;
        // print_r($cate);
        // $sort_by = $request->rating;
        $rating = $request->rating;
        if ($request->ajax()) {
            $data = User::getProviders($query, $cate, $rating, $posts, $users);
            return view('client.components.provider_data', compact('data'))->render();
            // return 'done';
        }
    }


    // show the user info

    function showUserProfile($user_id)
    {
        //get the user profile info
        $user_info = Profile::where('user_id', $user_id)->first();

        // give the category of the user
        $cateId = $user_info['category_id'];
        $cates = category::where('id', $cateId)->first();

        // give the skills of the user
        $myskills = UserSkills::join('skills', 'skills.id', '=', 'user_skills.skill_id')->where('user_id', $user_id)->get(['skills.name', 'user_skills.skill_id']);

        // give the roles of the user
        $user = User::find($user_id);
        $userRole = 'seeker';
        if ($user->hasRole('provider') && $user->hasRole('seeker')) {
            $userRole = 'both';
        } else if ($user->hasRole('provider')) {
            $userRole = 'provider';
        }

        return view('client.userProfile.userProfile')->with(['data' => $user_info, 'cate' => $cates, 'skills' => $myskills, 'role' => $userRole]);
    }
    public function insert_content($post_id, $provider_id)
    {
        $post = Posts::where('id', $post_id)->where('is_active', 1)->get();
        $provider = User::where('id', $provider_id)->where('is_active', 1)->get();
        $reports =  Report::select(
            'reports.id',
            // 'users.id',
            'reports.type_report',
            'reports.massege',
            'profiles.user_id',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'reports.user_id')

            ->where('post_id', $post_id)->get();
        return view('admin.report._form')->with(['reports' => $reports, 'post' => $post, 'post_id' => $post_id, 'provider_id' => $provider_id]);
    }
    public function insert_user($provider_id)
    {
        $provider = User::where('id', $provider_id)->where('is_active', 1)->get();
        $reports =  Report::select(
            'reports.id',
            'users.id',
            'reports.type_report',
            'reports.massege',
            'profiles.user_id',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'reports.user_id')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->where('provider_id', $provider_id)->get();
        return view('admin.report._form')->with(['reports' => $reports, 'provider' => $provider, 'provider_id' => $provider_id]);
    }
}
