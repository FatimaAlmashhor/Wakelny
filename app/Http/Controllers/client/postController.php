<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comments;
use App\Models\PostModel;
use App\Models\Posts;
use App\Models\PostSkills;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Notifications\PostNotification;
use Dotenv\Validator;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Mockery\Expectation;

class PostController extends Controller
{
    // this page show the list of the posts
    public function showAll()
    {
        $projects =  Posts::select(
            'posts.id',
            'posts.user_id',
            'posts.title',
            'posts.offers',
            'posts.description',
            'profiles.name',
            'profiles.user_id as provider_id'
        )->join('profiles', 'profiles.user_id', '=', 'posts.user_id')->where('is_active', 1)->where('status', 'open')->orderBy('id', 'DESC')->get();


        $cates = category::where('is_active', 1)->get();

        // return response()->json($cates);
        return view('client.user.projectlancer')->with(['posts' => $projects, 'categories' => $cates]);
    }


    // this route show one page
    public function showOne($post_id)
    {
        try {
            $post = Posts::select(
                'posts.*',
                'profiles.name as post_user_name',
                'profiles.user_id as post_user_id',
                'profiles.specialization as post_user_specialization',
            )->join('profiles', 'profiles.user_id', 'posts.user_id')->where('id', (int)$post_id)->where('is_active', 1)->first();


            $skills = PostSkills::select('skills.name')
                ->join('skills', 'skills.id', '=', 'post_skills.skill_id')
                ->where('post_id', (int)$post_id)
                ->where('is_active', 1)
                ->get();


            $comments =  Comments::select(
                'profiles.name',
                'profiles.specialization',
                'profiles.rating',
                'profiles.user_id',
                'comments.duration',
                'comments.cost',
                'comments.description',
                'comments.id as offer_id',
                'comments.user_id as provider_id',
                // DB::table('works')->raw("count(works.id) as workcount")
            )
                ->join('profiles', 'profiles.user_id', '=', 'comments.user_id')
                // ->join('works', 'works.user_id', '=', 'comments.user_id')
                ->where('post_id', (int)$post_id)
                ->groupBy([
                    'comments.id',
                    'profiles.name',
                    'profiles.specialization',
                    'profiles.rating',
                    'profiles.user_id',
                    'comments.cost',
                    'comments.description',
                    'comments.user_id',
                    'comments.duration',
                ])
                ->get();
            $checkProject = Project::select(
                'status'
            )
                ->where('post_id', (int)$post_id)
                ->where('status', '!=', 'rejected')
                ->first();

            // print_r($comments);
            $hasComment = Comments::where('post_id', (int)$post_id)->where('user_id', Auth::id())->count();

            // return response()->json($post);
            return view('client.post.postDetails')->with([
                'post' => $post,
                'comments' => $comments,
                'post_id' => $post_id,
                'skills' => $skills,
                'hasComment' => $hasComment > 0 ? true : false,
                'checkHasProject' => $checkProject ? true : false
            ]);
        } catch (\Throwable $th) {
            return back()->with(['message' => ' هنالك مشكله ما رجاء قم باعاده المحاوله', 'type' => 'alert-danger']);
        }
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
                'duration' => ['required', 'numeric', 'gt:0'],
            ], [
                'title.required' => 'يجب ان تقوم بأدخال عنوان للمشروع',
                'title.min' => 'يجب ان يحتوي العنوان على 15 حرف على الاقل',
                'title.max' => 'يجب ان يحتوي العنوان على 35 حرف على الاكثر',
                'category.required' => 'رجاء ادخل القسم ',
                'cost.required' => 'رجاء قم بأدخال التكلفه لهذا المشروع',
                'message.required' => 'اضف وصف للمشروع',
                'message.min' => 'حقل الوصف يجب ان يحتوي على 255 حرف على الاقل',
                'duration.required' => 'حقل المده مطلوب',
                'duration.numeric' => 'يجب ان يكون حقل المده من نوع رقمي',
                'duration.gt' => 'يجب ان يكون حقل المده اكبر من صفر',

            ]);



            $post = new Posts();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->message;
            $post->cost = $request->cost;
            $post->duration = $request->duration;
            $post->category_id = $request->category;
            $post->status = 'open';

            if ($request->hasFile('files'))
                $post->file = $this->uploadFile($request->file('files'));

            if ($post->save()) {


                // ! send notification to all the users in the same category in the database except the owner
                // !still not working
                // $users = Profile::select('profiles.user_id')->join('categories', 'profiles.category_id', '=', 'categories.id')->where('categories.id', $request->category)->get();
                $users = User::select(
                    'users.id',
                    'users.name',
                    'categories.title'
                )
                    ->join('profiles', 'profiles.user_id', '=', 'users.id')
                    ->join('categories', 'profiles.category_id', '=', 'categories.id')
                    ->where('categories.id', $request->category)
                    ->get();
                // $users = User::with( 'inTheSameCategoriy')->where('category_id', $request->category)->get();
                $data = [
                    'category' => '',
                    'post_title' => $request->title,
                    'url' => url('posts/derails/' .  $post->id)
                ];
                // FacadesNotification::send($users, new PostNotification($data));
                // print_r($users);




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

                return redirect('/posts/details/' . $post->id)
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
    {
        $post = Posts::find($post_id);
        $skill = Skill::where('is_active', 1)->get();
        $categories = category::where('is_active', 1)->get();

        return view('client.post.editPost')->with(['data' => $post, 'skills' => $skill, 'categories' => $categories]);
    }


    public function showProject()
    {

        try {
            $project = Project::select(
                'posts.title',
                'projects.amount',
                'projects.id as project_id',
                'projects.seeker_id as seeker_id',
                'projects.provider_id as provider_id',
                'projects.totalAmount',
                'projects.status',
                'projects.payment_status',
                'projects.invoice',
                'projects.created_at',
                'projects.duration',
                'projects.post_id',
            )->join('posts', 'posts.id', 'projects.post_id')

                ->get();
            // return response()->json($projects);
            return view('client.post.myProject')->with('projects', $project);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (Expectation   $th) {
            // throw $th;
            return back()->with(['message' => 'حدث خطأ   ', 'type' => 'alert-danger']);
        }
    }

    public function update(Request $request, $post_id)
    {
        try {
            $request->validate([
                'title' => ['required', 'min:15'],
                'category' => ['required'],
                'cost' => ['required'],
                'message' => ['required', 'min:100'],
                'duration' => ['required', 'numeric', 'gt:0'],
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
                'duration.gt' => 'يجب ان يكون حقل المده اكبر من صفر',
            ]);



            $post = Posts::find($post_id);
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->description = $request->message;
            $post->cost = $request->cost;
            $post->duration = $request->duration;
            $post->category_id = $request->category;

            if ($request->hasFile('files'))
                $post->file = $this->uploadFile($request->file('files'));
            if ($post->save()) {


                return redirect()->route('myProject')
                    ->with(['message' => 'تم تعديل المشروع بنجاح', 'type' => 'alert-success']);
            } else
                return back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return redirect()->back()->with(['message' => 'لقد استغرت العمليه اطول من الوقت المحدد لها ', 'type' => 'alert-success']);
        } catch (Expectation   $th) {
            // throw $th;
            return back()->with(['message' => 'فشلت عمليه التعديل الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
        }
    }

    public function toggle($post_id)
    {

        $post = Posts::find($post_id);
        $post->is_active *= -1;
        if ($post->save())
            return redirect()->route('myProject')->with(['message' => 'تم حذف المشروع بنجاح', 'type' => 'alert-success']);
        return back()->with(['message' => 'فشلت عمليه الحذف الرجاء اعاده المحاوله   ', 'type' => 'alert-danger']);
    }
}