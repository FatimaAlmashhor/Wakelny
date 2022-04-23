<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use App\Utilities\FreelancerFilter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class UserController extends Controller
{
    //

    function index(Request $request)
    {
        $seeker =  User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('role_user.role_id', 3)
            ->get();

        /**
         * ! why the model in the small?
         */
        $cates = category::get();
        $skill = Skill::get();


        // $test = new FreelancerFilter();
        // print_r($test);

        // $filter = QueryBuilder::for(Profile::class)
        //     ->allowedFilters([
        //         'name',
        //         'rating',
        //         'specialization',
        //         AllowedFilter::custom('freelancers', new FreelancerFilter),
        //     ])
        //     ->get();
        // return response()->json($filter);;
        return view('client.user.freelancers')->with(['data' => $seeker, 'cates' => $cates, 'skills' => $skill]);
    }
}