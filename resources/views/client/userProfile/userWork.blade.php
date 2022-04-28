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

    <div class="container">
        <h3 class="my-5"> إضافة عمل جديد</h3>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm ">



                    <div class="card-body">
                    <form action="" method="POST" class="login-form"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                                     عنوان العمل</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" name="title"
                                            value="">
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                              تاريخ الإنجاز</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="" name="comple_date"
                                            value="">
                                    </div>
                                  
                                </div>
                            
                             

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                                 صورة مصغرة</label>
                                    <div class="col-sm-10">
                                        <input type="file"  class="form-control" id="" name="main_image"
                                            value="">
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                    رابط العمل</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="" name="link"
                                            value="">
                                    </div>
                                  
                                </div>
                            
                             

                            </div>
                            <div class="row" style="margin-right:1px;">

                                <label for="" class="col-md-6 col-form-label"> تفاصيل العمل</label>
                                <textarea class="form-control" placeholder=" تفاصيل العمل" id=""
                                    name="details"></textarea>
                               
                                  
                            </div>
                    

                            <div class="row ">
                         

                               
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                           صور وملفات العمل</label>
                                    <div class="col-sm-10">
                                        <input type="file"  class="form-control" multiple id="" name="more_file"
                                            value="">
                                    </div>
                                   
                                </div>
                                
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label"  style="" >
                                    {{ __('filter.skills') }}</label>
                                        <select class="selectpicker col-md-6 " value="بالاختيار" name="skills[]" multiple aria-label="size 2 select example"
                                                    data-actions-box="true">
                                                    @foreach ($skills as $item)
                                                   
                                                        <option id='skills' value="{{ $item->id }}" autocomplete="off">{{ $item->name }}</option>
                                                    @endforeach
                                        </select>
                     
                                </div>
                            </div> 

                            <div class="row w-full  ">

                                <button class="wak_btn w-full my-4" style="margin-right: 10px;"  type="submit">أحفظ</button>

                            </div>

                    {{ csrf_field() }}
                    </form>
                    </div>
                    </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <h6> <i class="fa-solid fa-lightbulb p-2" class="postCplor"></i>ابدأ ببناء معرض أعمالك   </h6>
            <p>
أضف أعمالك السابقة التي قمت بتنفيذها، إضافة الاعمال للملف الشخصي يساعد أصحاب المشاريع على معرفة مهاراتك ويزيد من فرص توظيفك.</p>

            </div>

        </div>
    </div>
@endsection
