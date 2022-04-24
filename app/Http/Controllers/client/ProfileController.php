<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    public function edit_profile()
    {
        $categories=category::all();

        $profile = Profile::where('user_id', Auth::id())->get();
           return view('client.userProfile.profile')->with(['data'=>$profile,'categories'=>  $categories]);
          
       
    }

    public function profile_save(Request $request){
        $current_user_id = Auth::user()->id;
    
        Profile::where('user_id', $current_user_id)->update(
            [  
                 'account_type' => $request->input('account_type'),
                'job_title' => $request->input('job_title'),
                'specialization'    =>  $request->input('specialization'),
                'bio'  =>  $request->input('bio'),
                'video'  =>  $request->input('video'),
            ]

        );
        return redirect()->route('profile')
            ->with('success','profile updated successfully');
    }

    function savecategories(Request $request)
    {
        $categories = $request->categories;
        print_r($categories);
        if (blank($categories)) {
            return redirect()->back()->with(['message' => 'Please Add new categories', 'type' => 'alert-danger']);
        } else {
            $needToInsert = false;
            // insert if the categories are new
            foreach ($categories  as $value) {
                $findcategory = Usercategories::where('user_id', Auth::id())->where('category_id', $value)->get();

                if ($findcategory->isEmpty()) {
                    $message = ['message' => 'categories added successfuly', 'type' => 'alert-success'];
                    Usercategories::insert(['category_id' => $value, 'user_id' => Auth::id()]);
                } else {
                    $message = ['message' => 'These categories already exist', 'type' => 'alert-danger'];
                }

                print_r(['category_id' => $value, 'user_id' => Auth::id()]);
            }

            return redirect()->back()->with($message);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
