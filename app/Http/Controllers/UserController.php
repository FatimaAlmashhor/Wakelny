<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use App\Models\category;
use App\Models\Evaluation;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use App\Models\Posts;
use App\Models\Report;
use App\Models\UserSkills;
use App\Models\work;
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
        try {
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

            $works = work::where('is_active', 1)->where('user_id', $user_id)->get();
            $posts = Posts::where('is_active', 1)->where('user_id', $user_id)->get();

            $rating_count = Evaluation::select(
                'value',
            )->where('user_id', $user_id)->count('value');

            $rating_sum = Evaluation::select(
                'value',
            )->where('user_id', $user_id)->sum('value');

            if ($rating_count != 0) {
                $rating_avg = round($rating_sum / $rating_count);
            } else {
                $rating_avg = 0;
            }
            $profile = Profile::where('user_id', $user_id)->update([
                'rating' => $rating_avg
            ]);

            $evaluations = Evaluation::select(
                'evaluations.message',
                'evaluations.created_at',
                'evaluations.evaluater_id',
                'evaluations.value',
                'evaluaters.name as evaluater_name',
                'evaluaters.avatar',
                'projects.status',
                'posts.title'
            )
                ->where('evaluations.user_id', $user_id)->where('projects.status', 'received')
                ->join('profiles as evaluaters', 'evaluaters.user_id', '=', 'evaluations.evaluater_id')
                ->join('projects', 'projects.id', '=', 'evaluations.project_id')
                ->join('posts', 'posts.id', '=', 'projects.post_id')
                ->get();

            return view('client.userProfile.userProfile')->with([
                'data' => $user_info,
                'cate' => $cates,
                'skills' => $myskills,
                'role' => $userRole,
                'works' => $works,
                'post' => $posts,
                'rating' => $rating_avg,
                'rating_count' => $rating_count,
                'evaluations' => $evaluations
            ]);
        } catch (\Throwable $th) {
            return view('errors.404');
        }
    }
    public function insert_content($post_id)
    {

        return view('admin.report._form')->with(['post_id' => $post_id]);
    }
    public function insert_user($provider_id)
    {

        return view('admin.report._form')->with(['provider_id' => $provider_id]);
    }
}