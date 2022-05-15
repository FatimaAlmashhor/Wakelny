@extends('client.master_layout')
@section('content')

    <main class="container pt-20">
            <!-- top nav start -->
            <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <h3 class="m-5 font-xl font-bold">  الابلاغ عن </h3>

                </nav>
          
            </div>
            <!-- top nav end -->
            <div class=" flex flex-col ">
                    <div class="shadow-lg border-md w-full  h-fit p-5">

                        <div class=" border-b border-primary-light-gray py-3">
                            <div class="flex justify-between">
                                <p  class="font-md font-bold "> أسم المشروع</p>
                                <button class="mo-btn btn-blue-bg">حالة المشروع</button>
                            </div>
                            <p  class="font-md font-bold mt-4">  معلومات إضافية</p>
                        </div>
                        <div class="content mt-3">
                            <div class="flex items-center gap-x-2 my-4">
                                <h3 class="font-md font-bold">
                                    الوقت :
                                </h3>
                                <p class="font-sm text-dark-gray">
                                   5 ايام
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2 my-4">
                                <h3 class="font-md font-bold">
                                    التكلفة :
                                </h3>
                                <p class="font-sm text-dark-gray">
                                     900000
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
 
            <p  class="font-md font-bold my-8 mr-4">  البلاغات</p>
                <div class="flex justify-between flex-wrap flex-col md:flex-row items-center justify-start gap-x-4 ">
                
                    <div class=" w-full flex-1 p-3 bg-sacondary-light-white-pinky rounded my-2" >
                        <form class="w-full">
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                                    <label class="block font-md mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                        for="grid-first-name">
                                        <b>     الاسم </b>
                                    </label>
                                </div>
                                <div class="w-full md:w-1/2 ">
                                    <label class="block font-md my-4  tracking-wide text-gray-700 text-xs  mb-2"
                                        for="grid-last-name">
                                    <b>   النوع:</b>
                                        مقدم خدمة
                                    </label>
                                </div>                                  
                                    <!-- <p class="text-right block font-sm  tracking-wide text-gray-700 text-xs  mb-2 mx-8 my-4">So I started to walk into the water...</p> -->
                                
                                            <div class="w-full px-3">
                                                    <label class="block font-md mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                                        for="grid-first-name">
                                                        <b>   البلاغ </b>
                                                    </label>
                                                <textarea rows="4" 
                                                    class="appearance-none block my-4 w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink">
                                                </textarea>

                                            </div>
                
                            </div>
                        

                        
                            <div class="flex justify-end w-full px-3 ">
                                
                                <button
                                    class=" mo-btn btn-bg-blue  shadow bg-indigo-600 hover:bg-indigo-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                                    type="submit">
                                إرجاع الفلوس
                                </button>
                            </div>
                            <div>
                                
                            </div>
                        </form>
                    </div>
                    
                    
                    <div class=" w-full p-3 flex-1 bg-sacondary-light-white-pinky rounded my-2">
                        <form class="w-full">
                                <div class="flex flex-wrap mx-3 mb-6">
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                                        <label class="block font-md mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                            for="grid-first-name">
                                            <b>     الاسم </b>
                                        </label>
                                    </div>
                                    <div class="w-full md:w-1/2 ">
                                        <label class="block font-md my-4  tracking-wide text-gray-700 text-xs  mb-2"
                                            for="grid-last-name">
                                        <b>   النوع:</b>
                                            مقدم خدمة
                                        </label>
                                    </div>                                  
                                        <!-- <p class="text-right block font-sm  tracking-wide text-gray-700 text-xs  mb-2 mx-8 my-4">So I started to walk into the water...</p> -->
                                    
                                                <div class="w-full px-3">
                                                        <label class="block font-md mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                                            for="grid-first-name">
                                                            <b>   البلاغ </b>
                                                        </label>
                                                    <textarea rows="4" 
                                                        class="appearance-none block my-4 w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink">
                                                    </textarea>

                                                </div>
                    
                                </div>
                            

                            
                                <div class="flex justify-end w-full px-3 ">
                                    
                                    <button
                                        class=" mo-btn btn-bg-blue  shadow bg-indigo-600 hover:bg-indigo-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                                        type="submit">
                                    إرجاع الفلوس
                                    </button>
                                </div>
                                <div>
                                    
                                </div>
                        </form>
                    </div>
                
                </div>

         
        </main>
@endsection
