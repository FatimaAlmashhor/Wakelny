<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comments;
use App\Models\PostModel;
use App\Models\Posts;
use App\Models\PostSkills;
use App\Models\Skill;
use Dotenv\Validator;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Expectation;

class PostController extends Controller
{
    // this page show the list of the posts
    public function showAll()
    {
        $projects =  Posts::select(
            'posts.id',
            'posts.title',
            'posts.offers',
            'posts.description',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'posts.user_id')->where('is_active', 1)->get();

        // return response()->json($projects);
        return view('client.user.projectlancer')->with('posts', $projects);
    }


    // this route show one page
    public function showOne($post_id)
    {
        $post = Posts::where('id', $post_id)->where('is_active', 1)->get();
        $comments =  Comments::select(
            'profiles.name',
            'profiles.specialization',
            'profiles.rating',
            'profiles.user_id',
            'comments.duration',
            'comments.cost',
            'comments.description',
            'comments.id as offer_id',

        )
            ->join('profiles', 'profiles.user_id', '=', 'comments.user_id')
            ->where('post_id', $post_id)->get();
            $hasComment=Comments::where('post_id',$post_id)->where('user_id',Auth::id())->count();

        // return response()->json($comments);
       return view('client.post.postDetails')->with(['post' => $post, 'comments' => $comments, 'post_id' => $post_id, 'hasComment'=>$hasComment>0 ? true: false]);
    }
    // page for show the form of create new post
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
                'message' => ['required', 'min:100'],
                'duration' => ['required', 'numeric'],
            ], [
                'title.required' => 'يجب ان تقوم بأدخال عنوان للمشروع',
                'title.min' => 'يجب ان يحتوي العنوان على 15 حرف على الاقل',
                'title.max' => 'يجب ان يحتوي العنوان على 35 حرف على الاكثر',
                'category.required' => 'رجاء ادخل القسم ',
                'cost.required' => 'رجاء قم بأدخال التكلفه لهذا المشروع',
                'message.required' => 'اضف وصف للمشروع',
                'message.min' => 'حقل الوصف يجب ان يحتوي على 255 حرف على الاقل',
                'duration.required' => 'حقل المده مطلوب',
                'duration.numeric' => 'يجب ان يكون حق المده من نوع رقمي',

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
        } catch (Expectation   $th) {
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
// /////////////////////////////

    // edit post
     public function editPosts($post_id)
    { $post = Posts::find($post_id);
     $skill = Skill::where('is_active', 1)->get();
    $categories = category::where('is_active', 1)->get();

        return view('client.post.editPost')->with(['data'=>$post, 'skills' => $skill, 'categories' => $categories]);
    }
     public function postDesciption()
    {

        return view('client.post.postdescription');
    }

       public function showProject()
    {
        $projects =  Posts::select(
            'posts.id',
            'posts.title',
            'posts.offers',
            'posts.description',
            'profiles.name'
        )->join('profiles', 'profiles.user_id', '=', 'posts.user_id')->where('is_active', 1)->where('posts.user_id',Auth::id())->get();

        // return response()->json($projects);
        return view('client.post.myProject')->with('posts', $projects);
    }


     public function update(Request $request, $post_id)
    {
        try {
            $request->validate([
                'title' => ['required', 'min:15'],
                'category' => ['required'],
                'cost' => ['required'],
                'message' => ['required', 'min:100'],
                'duration' => ['required', 'numeric'],
            ], [
                'title.required' => 'يجب ان تقوم بأدخال عنوان للمشروع',
                'title.min' => 'يجب ان يحتوي العنوان على 15 حرف على الاقل',
                'title.max' => 'يجب ان يحتوي العنوان على 35 حرف على الاكثر',
                'category.required' => 'رجاء ادخل القسم ',
                'cost.required' => 'رجاء قم بأدخال التكلفه لهذا المشروع',
                'message.required' => 'اضف وصف للمشروع',
                'message.min' => 'حقل الوصف يجب ان يحتوي على 255 حرف على الاقل',
                'duration.required' => 'حقل المده مطلوب',
                'duration.numeric' => 'يجب ان يكون حق المده من نوع رقمي',

            ]);



            $post=Posts::find($post_id);
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->message;
            $post->cost = $request->cost;
            $post->duration = $request->duration;
            $post->category_id = $request->category;

            if ($request->hasFile('files'))
                $post->file = $this->uploadFile($request->file('files'));

            if ($post->save()){


                return redirect()->route('myProject')
                    ->with(['message' => 'تم تعديل المشروع بنجاح', 'type' => 'alert-success']);
            } else
                return back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        } catch (Expectation   $th) {
            // throw $th;
            return back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
    }

    public function toggle($post_id){

        $post=Posts::find($post_id);
        $post->is_active*=-1;
         if($post->save())
        return back()->with(['message' => 'تم حذف المشروع بنجاح', 'type' => 'alert-success']);
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }



    }


