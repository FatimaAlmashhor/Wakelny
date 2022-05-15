@extends('admin.master_layout')
@section('content')
   
    <main class="container ">
            <!-- top nav start -->
            <div class="row mx-1   col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <h3 class="m-3 font-md font-bold">  الابلاغ عن </h3>
                </nav>
            </div>
            <!-- top nav end -->
            <div class=" flex flex-col ">
                    <div class="shadow-lg border-md w-full   p-2 px-4">

                        <div class=" border-b border-primary-light-gray py-3">
                            <div class="flex justify-between">
                                <p  class="font-sm font-bold "> أسم المشروع</p>
                                <button class="mo-btn btn-blue-bg">حالة المشروع</button>
                            </div>
                            <p  class="font-sm font-bold mt-4">  معلومات إضافية</p>
                        </div>
                        <div class="content mt-3">
                            <div class="flex items-center gap-x-2 my-4">
                                <h3 class="font-sm font-bold">
                                    الوقت :
                                </h3>
                                <p class="font-sm text-dark-gray">
                                   5 ايام
                                </p>
                            </div>
                            <div class="flex items-center gap-x-2 my-4">
                                <h3 class="font-sm font-bold">
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
                
                    <div class=" w-full flex-1 p-3 bg-white rounded my-2" >
                        <form class="w-full">
                            <div class="flex flex-wrap mx-3 mb-6">
                                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                                    <label class="block font-sm mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                        for="grid-first-name">
                                        <b>     الاسم </b>:
                                            afnan
                                    </label>
                                </div>
                                <div class="w-full md:w-1/2 ">
                                    <label class="block font-sm my-4  tracking-wide text-gray-700 text-xs  mb-2"
                                        for="grid-last-name">
                                    <b>   النوع:</b>
                                        طالب خدمة
                                    </label>
                                </div>                                  
                                
                                            <div class="w-full px-3">
                                                    <label class="block font-sm mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                                        for="grid-first-name">
                                                        <b>   البلاغ </b>
                                                    </label>
                                                <p class="text-right block font-sm  tracking-wide text-gray-700 text-xs  mb-2 mx-8 my-4"> {{$report->massege}} </p>

                                                   
                                              

                                            </div>
                
                            </div>
                        

                        
                          
                            <a class='mo-btn m-3 float-left'
                                    href='{{ route('payment.sendMoenyBackTo', ['who' => 'provider', 'project_id' => $report->project_id]) }}'>ارجاع
                                    الفلوس
                                    لطالب الخدمه
                            </a>
                            <div>
                                
                            </div>
                        </form>
                    </div>
                    
                    
                    <div class=" w-full p-3 flex-1 bg-white rounded my-2">
                        <form class="w-full">
                                <div class="flex flex-wrap mx-3 mb-6">
                                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                                        <label class="block font-sm mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                            for="grid-first-name">
                                            <b>     الاسم </b>:
                                            afnan
                                        </label>
                                    </div>
                                    <div class="w-full md:w-1/2 ">
                                        <label class="block font-sm my-4  tracking-wide text-gray-700 text-xs  mb-2"
                                            for="grid-last-name">
                                        <b>   النوع:</b>
                                            مقدم خدمة
                                        </label>
                                    </div>                                  
                                        <!-- <p class="text-right block font-sm  tracking-wide text-gray-700 text-xs  mb-2 mx-8 my-4">So I started to walk into the water...</p> -->
                                    
                                                <div class="w-full px-3">
                                                        <label class="block font-sm mx-4 my-4 tracking-wide text-gray-700 text-xs  mb-2"
                                                            for="grid-first-name">
                                                            <b>   البلاغ </b>
                                                        </label>
                                                        <p class="text-right block font-sm  tracking-wide text-gray-700 text-xs  mb-2 mx-8 my-4"> {{$report->massege}} </p>

                                                </div>
                    
                                </div>
                            

                            
                            <a class='mo-btn m-3 float-left' 
                                href='{{ route('payment.sendMoenyBackTo', ['who' => 'seeker', 'project_id' => $report->project_id]) }}'>ارجاع
                                الفلوس لمقدم الخدمه
                            </a>
                                <div>
                                    
                                </div>
                        </form>
                    </div>
                
            </div>

         
    </main>
@endsection
