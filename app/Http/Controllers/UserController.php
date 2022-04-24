<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstants;
use App\Models\category;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use App\Utilities\FreelancerFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class UserController extends Controller
{
    //

    function index(Request $request)
    {

        $providers = User::getProviders('', GlobalConstants::ALL, GlobalConstants::ALL);

        /**
         * ! why the model in the small?
         */
        $cates = category::get();
        $skill = Skill::get();


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


        return view('client.user.freelancers')->with(['data' => $providers, 'cates' => $cates, 'skills' => $skill]);
    }


    function filter(Request $request)
    {
        // other try 

        $query = $request->search_query;
        $cate = $request->cates;
        $skills = $request->skills;
        // print_r($cate);
        // $sort_by = $request->rating;
        $rating = $request->rating;
        if ($request->ajax()) {
            $data = User::getProviders($query, $cate, $rating);
            return view('client.components.provider_data', compact('data'))->render();
            // return 'done';
        }
    }
}