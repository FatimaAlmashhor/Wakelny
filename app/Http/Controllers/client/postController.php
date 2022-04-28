<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\PostModel;
use App\Models\Posts;
use App\Models\PostSkills;
use App\Models\Skill;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    public function index()
    {
        $skill = Skill::where('is_active', 1)->get();
        $categories = category::where('is_active', 1)->get();
        return view('client.post.post')->with(['skills' => $skill, 'categories' => $categories]);
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required', 'min:15'],
                'category' => ['required'],
                'cost' => ['required'],
                'description' => ['required', 'min:100'],
                'duration' => ['required', 'numeric'],
            ], [
                'title.required' => 'يجب ان تقوم بأدخال عنوان للمشروع',
                'title.min' => 'يجب ان يحتوي العنوان على 15 حرف على الاقل',
                'title.max' => 'يجب ان يحتوي العنوان على 35 حرف على الاكثر',
                'category.required' => 'رجاء ادخل القسم ',
                'cost.required' => 'رجاء قم بأدخال التكلفه لهذا المشروع',
                'description.required' => 'اضف وصف للمشروع',
                'description.min' => 'حقل الوصف يجب ان يحتوي على 255 حرف على الاقل',
                'duration.required' => 'حقل المده مطلوب',
                'duration.number' => 'يجب ان يكون حق المده من نوع رقمي',

            ]);



            $post = new Posts();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->message;
            $post->cost = $request->cost;
            $post->duration = $request->duration;
            $post->category_id = $request->category;

            if ($request->hasFile('files'))
                $post->file = $this->uploadFile($request->file('files'));

            if ($post->save()) {


                $skills = $request->skills;
                $needToInsert = false;
                // insert if the skills are new
                if (!blank($skills))
                    foreach ($skills  as $value) {
                        $findSkill = PostSkills::where('post_id', $post->id)->where('skill_id', $value)->get();

                        if ($findSkill->isEmpty()) {
                            PostSkills::insert(['skill_id' => $value, 'post_id' =>  $post->id]);
                        }
                    }
                return redirect()->route('profile')
                    ->with(['message' => 'تم اضافة مشروع جديدة بنجاح', 'type' => 'alert-success']);
            } else
                return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['message' => 'فشلت عمليه الاضافة الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
    }


    // file upload 
    public function uploadFile($file)
    {
        $dest = public_path() . "/postsFiles/";

        //$file = $request->file('image');

        $filename = time() . "_" . $file->getClientOriginalName();
        $file->move($dest, $filename);

        return $filename;
    }
}