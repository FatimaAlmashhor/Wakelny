@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{  __('dash.user_Statistics')}} </h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold ">{{ __('dash.user_numb') }} </h6>
                                        <h6 class="font-extrabold mb-0">{{ $user }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                       <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">{{ __('dash.post_numb') }} </h6>
                                        <h6 class="font-extrabold mb-0">{{ $post }}</h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"> الاقسام </h6>
                                        <h6 class="font-extrabold mb-0">{{ $cates }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                        <i class="fa-solid fa-flag-checkered"></i>                                         </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">البلاغات</h6>
                                        <h6 class="font-extrabold mb-0">{{ $reports }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> {{ __('dash.user_numb') }} </h4>

                            </div>
                            <div class="card-body">
                               <canvas id="myChart" height="100px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            
               
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/admin//images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"> {{ auth()->user()->name }}</h5>
                                <h6 class="text-muted mb-0">@.{{ auth()->user()->name }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- <div class="card">
                    <div class="card-header">
                        <h4>Visitors Profile</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div> -->
            </div>
        </section>
    </div>


 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  

<script type="text/javascript">

  

      var labels =  {{ Js::from($labels) }};

      var users =  {{ Js::from($data) }};

  

      const data = {

        labels: labels,

        datasets: [{

          label: 'المخطط الزمني للمستخدمين',

          backgroundColor: 'rgb(255, 99, 132)',

          borderColor: 'rgb(255, 99, 132)',

          data: users,

        }]

      };

  

      const config = {

        type: 'line',

        data: data,

        options: {}

      };

  

      const myChart = new Chart(

        document.getElementById('myChart'),

        config

      );

  

</script>
@endsection
