<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function list_category()
    {
        /**
         * !should this show only the item that are active?  
         */
        $categories = category::orderBy('id', 'desc')->get();
        return view('admin.categories.index')
            ->with('categories', $categories);
    }
    public function add_category()
    {
        return view('admin.categories._form');
    }
    public function edit($cat_id)
    {
        $category = category::find($cat_id);
        return view('admin.categories._form')
            ->with('data', $category);
    }
    public function toggle($cat_id)
    {

        $cat = category::find($cat_id);

        /**
        ! please is this mean delete?
         */
        $cat->is_active *= -1;
        /*if($cat->is_active==0)
        $cat->is_active=1;
        else
        $cat->is_active=0;*/
        if ($cat->save())
            return back()->with(['success' => 'data updated successful']);
        return back()->with(['error' => 'can not update data']);
    }
    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'title' => ['required'],

        ], [
            'title.required' => 'this field is required',



        ]);

        $new_cat = new category();
        $new_cat->title = $request->title;

        $new_cat->is_active = $request->is_active;

        if ($new_cat->save())
            return redirect()->route('list_categories')->with(['success' => 'data inserted successful']);
        return redirect()->back()->with(['error' => 'can not add data ']);
    }
    public function update(Request $request, $cat_id)
    {
        $cat = category::find($cat_id);
        $cat->title = $request->title;

        $cat->is_active = $request->is_active;

        if ($cat->save())
            return redirect()->route('list_categories')->with(['success' => 'data updated successful']);
        return redirect()->back()->with(['error' => 'can not update data ']);
    }
}