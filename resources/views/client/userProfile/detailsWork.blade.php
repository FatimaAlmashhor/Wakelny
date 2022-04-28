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
<div class="row mx-1  mt-2 col-12 d-flex justify-content-lg-between ">
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
       
            </div>
            <div class="col-md-4 col-sm-12">
             
            </div>

        </div>
    </div>
@endsection
