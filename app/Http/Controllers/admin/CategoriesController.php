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
        $categories = category::get();
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
       

        if ($cat->save())
            if($cat->is_active==-1)
                return back()->with(['message' => 'تم تعطيل القسم بنجاح', 'type' => 'alert-success']);
            else
                return back()->with(['message' => 'تم تفعيل القسم بنجاح', 'type' => 'alert-success']);
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
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
            return redirect()->route('list_categories')->with(['message' => 'تم اضافة قسم جديد بنجاح', 'type' => 'alert-success']);
        return redirect()->back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }
    public function update(Request $request, $cat_id)
    {
        $cat = category::find($cat_id);
        $cat->title = $request->title;

        $cat->is_active = $request->is_active;

        if ($cat->save())
            return redirect()->route('list_categories')->with(['message' => 'تم التعديل بنجاح', 'type' => 'alert-success']);
        return redirect()->back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }
}
