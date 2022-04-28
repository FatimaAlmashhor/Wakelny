<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\GlobalConstants;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;


class WorksController extends Controller
{
    function index(Request $request)
    {

        $providers = User::getProviders('', GlobalConstants::ALL, GlobalConstants::ALL);

        $skill = Skill::where('is_active', 1)->get();


        return view('client.userProfile.myWorks')->with(['data' => $providers, 'skills' => $skill]);
    }
    public function create()
    {
        $providers = User::getProviders('', GlobalConstants::ALL, GlobalConstants::ALL);

        $skill = Skill::where('is_active', 1)->get();

        return view('client.userProfile.userWork')->with(['data' => $providers, 'skills' => $skill]);
    }
    public function showDetails()
    {

        return view('client.userProfile.detailsWork');
    }
    
}

