<div class="">
    <div>
        <nav class=" navbar-expand navbar-light " dir="ltr">
            <div class="container-fluid">




                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">

                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="/assets/admin//images/faces/1.jpg">
                                    </div>
                                </div>

                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                            style="">
                            <li>
                                <h6 class="dropdown-header">اهلا, {{ auth()->user()->name }}</h6>
                            </li>


                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                    المحفظة</a></li>

                            <li>
                            <li><a class="dropdown-item" href="{{ route('change-password') }}"><i
                                        class="icon-mid bi bi-wallet me-2"></i>
                                    تغيير كلمة السر</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout"><i
                                        class="icon-mid bi bi-box-arrow-left me-2"></i> تسجيل خروج</a></li>
                        </ul>
                    </div>
                    <ul class="navbar-nav  mb-2 mb-lg-0">

                        <li class="nav-item ms-2 user-items">
                            <div class="nav-link active dropdown-toggle text-gray-600" aria-expanded="false"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                style="position: relative">
                                <i class="bi bi-bell bi-sub fs-4"></i>
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    <span
                                        style=" position: absolute; width:12px; height:12px ; border-radius : 50% ;background:red ; bottom: 10px ; left: 20px;">
                                {{-- {{ auth()->user()->unreadNotifications->count() }} --}}
                                    </span>
                                @endif


                            </div>

                            <ul class="dropdown-menu dropdown-menu-right mt-1 mx-5"
                                aria-labelledby="dropdownMenuButton1"
                                style="overflow: auto; width:340px ; hieght 70vh">

                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    <li class=""
                                        style="color: gray ; overflow-wrap: break-word; height: fit-content ;   ">
                                        <a class="dropdown-item color-black my-2 p-3"
                                            href="{{ $notification->data['url'] }}"
                                            style=' color: gray ; border-right: 4px solid {{ $notification->read_at == null ? 'red' : 'gray' }}  ; padding-right: 2px ; width:inherit; height: fit-content; '>
                                            @if ($notification->data['type'] == 'comment')
                                                {{-- <a href="{{ route('markAsReadOne', $notification->id) }}"> --}}
                                                <span> قام بأضافه
                                                    {{ $notification->data['name'] }}
                                                    عرض جديد على مشروعك</span>
                                                {{-- </a> --}}
                                            @else
                                                {{-- <a href="{{ route('markAsReadOne', $notification->id) }}"> --}}
                                                <span>
                                                    {{ $notification->data['message'] }}
                                                </span>
                                                {{-- </a> --}}
                                            @endif

                                        </a>
                                    </li>
                                @endforeach
                            </ul>



                        </li>

                    </ul>

                {{-- <div class="row mb-3 p-2">

                    <div class="input-group">
                        <div class="form-outline">
                          <input id="search-focus" type="search" id="form1" class="form-control" />
                          <label class="form-label" for="form1">Search</label>
                        </div>
                        <button type="button" class="btn btn-primary">
                          <i class="fas fa-search" style="color: blue"></i>
                        </button>
                      </div> --}}

{{--
                    <div class="col-md-3">
                  <label for=""> search </label>
                  <input type="text" style="border: 1px solid"; class="from-control" wire:model="term">

                    </div> --}}

                  {{-- </div> --}}

                  <div class=" " style="width: 90%; padding-top:5px ">
                    {{-- <div class="form-outline"> --}}
                        <div class="form-group has-search ">

                            <input type="text" class="form-control" placeholder="بحث" style=" border-radius: 24px;
                            direction: rtl;
                            margin-bottom: 5px;" wire:model="term">

                  </div>


                {{-- </div> --}}
            </div>


        </nav>
    </div>

    <div class="page-heading">
        <h3>{{ __('dash.all_users') }}</h3>
    </div>

    <!-- Table head options start-->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="table-responsive py-2">
                            <table class="table mb-0 ">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('dash.usre_name') }}</th>
                                        <th>{{ __('dash.user_email') }}</th>
                                        <th>{{ __('dash.State') }}</th>
                                        <th>{{ __('dash.user_is_active') }}</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>

                                            <td class="text-bold-500">{{ $item->name }}</td>
                                            <td class="text-bold-500">{{ $item->email }}</td>
                                            <td>
                                              @if($item->is_active == 1)
                                              <span  class="bg-primary-blue " style="color:white;  padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                              @else
                                              <span   class="bg-primary-pink " style="color:white;  padding: 5px 21px; border-radius: 5px;">معطل</span>
                                              @endif
                                              </td>
                                            <td>
                                                {{-- <a  href="{{ route('edit_user', $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                     <i class="fas fa-edit bx bx-edit-alt me-1"> </i>
                                                </a> --}}

                                                <a href="{{ route('ban_user', $item->id) }}" class="btn btn-icon btn-outline-dribbble">

                                                        @if($item->is_active == 0)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1 blue" > </i>
                                                        @else
                                                        <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#CD657C;" > </i>
                                                        @endif

                                                </a>

                                            </td>

                                            {{-- <td>
                                                <a  href="{{ route('edit_skill') }}" class="btn btn-icon btn-outline-dribbble">
                                                     <i class="fas fa-edit bx bx-edit-alt me-1"> </i>
                                                </a>

                                                <a   href="{{ route('toggle_skill', $item->id) }}" class="btn btn-icon btn-outline-dribbble">

                                                        @if($item->is_active == 1)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1" style="color:#ff5d5d;" > </i>
                                                            @else
                                                            <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#84e984;" > </i>
                                                        @endif
                                                </a>
                                            </td> --}}

                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- Table head options end -->
