
    @extends('client.master_layout')
    @section('content')
    <style>
        .bootstrap-select>.dropdown-toggle.bs-placeholder, 
    .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
     .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
      .bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
       [type=button]:not(:disabled), [type=reset]:not(:disabled), 
       .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled)
                                {
                                    border: 1px solid #d5dadf; 
                                    width: 257px;
                                    text-align: right;
    
                                }
    .bootstrap-select[class*=col-] .dropdown-toggle {
            width:675px; 
    }
    </style>
    <div class="row mx-1  mt-2 d-flex justify-content-lg-between ">
                    <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                        <ol class="breadcrumb ms-3">
                            <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>&nbsp&nbsp/&nbsp
                            <li class=" fs-6 fw-bold">  تفاصيل العمل &nbsp&nbsp /</li>
                            <li class=" active fs-6 fw-bold" aria-current="page"> 
                                  &nbsp  Hot Coffee logo  </li>
                        </ol>
    
                    </nav>
    </div>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                        <div class="card-body">
                        
                                @csrf


                                <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                    <img src="/images/file2.jpg" alt="">
                                </div>
                                <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                    <img src="/images/file2.jpg" alt="">
                                </div>
                                <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                    <img src="/images/file2.jpg" alt="">
                                </div>
                                <div class="row my-4   ">
                                   
                                    
                                    <label for="" class="col-md-6 col-form-label fw-bold color-green ">
                                    تفاصيل العمل</label>
                                    <p class="mx-2">تم تصميم العرض بطريقة حديثة مع إضافة بعض الرسوم المتحركة والتأثيرات مثل تأثير كين بيرنز لإظهار أجمل الأماكن السياحية في الأردن. يمكنك رؤية العمل بشكل أوضح من خلال الرابط أدناه</p>
                                    <a class="color-green mx-2">https://drive.google.com/file/d/1JLS0YwhOijAbAN0N5wYyydGsnUnvNrrg/view?usp=sharing</a>
                              
                                </div>
                            
                              


                        {{ csrf_field() }}
                   
                        </div>
                        </div>
                </div>

                <div class="col-md-4 col-sm-12">
                <div class="card shadow-sm pr-4 py-1 ">
                        
                      
                        <div class="pt-3 pb-2 " style="border-bottom: 1px solid var(--bg-main-bg)">
                        <h5 style="color: var(--bg-color-0);font-size: 17px"> بطاقة العمل </h5>
                        </div>
                        <div class="row p-3">
                            <div class="row" style="padding:4px 5px">
                                <div class="col-6 col-md-7 col-lg-6 col-xl-5 text-right  p-1" style="color: var(--bg-color-0);font-size: 13px;">
                                تاريخ النشر
                                </div>
                                <div class="col-6 col-md-5 col-lg-6 col-xl-7 px-0 text-right p-1 font-1">
                                منذ 3 ساعات
                                </div>
                            </div>
                            <div class="row" style="padding:4px 5px">
                                    <div class="col-6 col-md-7 col-lg-6 col-xl-5 text-right  p-1" style="color: var(--bg-color-0);font-size: 13px;">
                                    المشاهدات
                                    </div>
                                    <div class="col-6 col-md-5 col-lg-6 col-xl-7 px-0 text-right p-1 font-1">
                                    6
                                    </div>
                            </div>
                            <div class="row" style="padding:4px 5px">
                                        <div class="col-6 col-md-7 col-lg-6 col-xl-5 text-right  p-1" style="color: var(--bg-color-0);font-size: 13px;">
                                        القسم
                                        </div>
                                        <div class="col-6 col-md-5 col-lg-6 col-xl-7 px-0 text-right p-1 " style="font-size:12px">
                                        <a href="https://nafezly.com/portfolios/specialize/design">تصميم وأعمال فنية وإبداعية</a>
                                        </div>
                            </div>
                        <div class="p-0 my-3" style="height:1px;background: var(--bg-main-bg);"></div>
                            <div class="px-2">
                            <span class="px-1" style="padding:4px 5px;font-size:12px">المستقل</span>
                            </div>
                        <div class="px-2 row d-flex align-items-center justify-content-between text-truncate" style="flex-wrap: nowrap;">
                                <div class="d-flex align-items-center">
                                <a href="" class="d-inline-block">
                                <img src="/assets/client/images/user-profile-2.png" style="width: 70px;border-radius:inherit;padding: 6px;;border-radius: 50%;">
                                </a>
                                            <div class="d-inline-block px-1" style="font-size:15px">
                                                <a href="" style="color: inherit;">
افنان
                                                </a>
                                                <div class="d-block mt-1" style="font-size:10px;opacity: 0.7;">
                                                <span class="d-inline-block">
                                                <span class="fas fa-suitcase mb-1 pl-0 pl-md-1  "></span>  مطورة ويب 
                                                </span>
                                                </div>
                                            </div>
                                </div>
                                <div style="width:96px">
                                    <a href="" class="d-inline-block  p-0">
                                    <span class="btn btn-outline-primary font-1 text-center  font-1" style="border-radius: 30px;padding: 5px 18px!important;">
                                    <span class="fas fa-paper-plane font-1"></span>
                                    <span class="font-1"> وظفني</span>
                                    </span>
                                    </a>
                                </div>
                        </div>
                        </div>
                    
                        
                        </div>
                </div>
    
            </div>
        </div>
    @endsection
    
