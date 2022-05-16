@extends('client.master_layout')
@section('content')
    <div class=" container d-flex justify-content-between mt-20">
        <h3 class="font-xl font-bold"> المشاريع اللتي اعمل عليها حاليه </h3>
        <div class="card--actions hidden-xs">
            <div class="dropdown btn-group">
                <div class="dropdown inline-block relative min-w-fit">
                    <a tabindex="-1"
                        class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center"
                        href="{{ route('workonProject') }}">
                        <i class="fa-solid fa-filter font-sm mx-1"></i>
                        <span class="mr-1"> اعمالي الحاليه </span>
                        <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path style="color:white ; stroke: white;
                                                                              fill: white;"
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </a>

                    <ul class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">
                        <li class="border-b border-primary-light-pink">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray py-2 px-4 block whitespace-no-wrap"
                                href="{{ route('doneWork') }}">
                                <i class="fa-solid fa-check font-sm px-3"></i>
                                <span class="mr-1"> اعمالي المنجزه </span>
                            </a>
                        </li>
                </div>
            </div>
        </div>



    </div>
    @foreach ($data as $item)
        {{-- one card --}}
        @if (request()->get('status') == 'reject')
            <div>لقد تم رفض أحد مشاريعك رجاء قم بالتأكد</div>
        @endif
        <div class="row d-flex flex-column justify-content-center">
            <div class="mx-lg-5 col-lg-9">
                <div class="container  card px-3 my-3 "
                    style='{{ $item->status == 'nonrecevied' ? 'border-right: 5px solid red' : 'border:none' }}'>

                    <div class="row ">
                        <div class="col-sm-6">
                            <a href="{{ route('confirm-project', [$item->project_id, $item->seeker_id]) }}"
                                class="my-5">
                                <p class="font-md"> {{ $item->title }}</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="card--actions hidden-xs  flex-wrap float-start">
                                <div class="dropdown btn-group">


                                    @if ($item->status == 'at_work' && $item->payment_status == 'paid')
                                        <a tabindex="-1" class="mo-btn btn-blue-bg cursor-pointer" data-bs-toggle="modal"
                                            data-bs-target="#model_{{ $item->project_id }}">
                                            <i class="fa-regular fa-paper-plane"></i>

                                            <span class="action-text">تسليم المشروع </span>

                                        </a>
                                    @endif
                                    @if ($item->status == 'at_work' && $item->payment_status == 'unpaid')
                                        <a class="mo-btn btn-pink-bg cursor-wait" aria-readonly="true" readOnly>
                                            {{-- <i class="fa-regular fa-paper-plane"></i> --}}

                                            <span class="action-text"> لم يتم الدفع بعد... </span>

                                        </a>
                                    @endif
                                    @if ($item->status == 'done')
                                        <button tabindex="-1" class="mo-btn " aria-disabled="true">
                                            <i class="fa-solid fa-spinner"></i>
                                            <span class="action-text"> انتظار الرد... </span>

                                        </button>
                                    @endif
                                    @if ($item->status == 'nonrecevied')

                                        <div class="col-12 mt-3">
                                            <a  class="mo-btn btn-pink-bg pink col-md-6"
                                                href='{{ route('continueProject', [$item->project_id]) }}'>
                                                <i class="fa-solid fa-spinner"></i>
                                                <span class="font-sm"> استئناف المشروع </span>

                                            </a>
                                            <a  class="mo-btn btn-blue-bg col-md-6" data-bs-toggle="modal"
                                                data-bs-target="#reject_{{ $item->project_id }}" {{-- style='background-color: red' --}}>
                                                <i class="fa-solid fa-flag-checkered"></i>
                                                <span class="font-sm"> قدم شكوى </span>

                                            </a>
                                        </div>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="info mx-0">

                        <div class="rate">
                            <ul
                                class="project__meta list-meta-items d-flex justify-content-start-flex margin-right: -23px;">

                                <li class="font-md   color-gray-dark">
                                    <i class="fa-regular fa-money-bill-1 "></i>
                                    <span style="color: red">${{ $item->amount }}</span>
                                </li>

                                {{-- !need to find the way of build it --}}
                                {{-- <li class="text-muted font-sm color-gray-dark px-3">
                            <time datetime="2022-04-23 12:21:47" title="" itemprop="datePublished" data-toggle="tooltip"
                                data-original-title="2022-04-23 12:21:47">
                                <i class="fa fa-clock-o"></i>
                                <span class="clock" data-countdown="{{ $item->stated_at }}"></span>
                            </time>
                        </li> --}}

                                <li class="text-muted font-md mx-3 color-gray-dark">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>{{ $item->stated_at }}</span>
                                </li>

                            </ul>
                        </div>

                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="model_{{ $item->project_id }}" tabindex="-1"
                        aria-labelledby="model_{{ $item->project_id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form class="modal-content" method="POST" action="{{ route('markAsDone') }}">
                                @csrf
                                <input hidden type="hidden" value='{{ $item->project_id }}' name='project_id' />
                                <input hidden type="hidden" value='{{ $item->seeker_id }}' name='seeker_id' />
                                <div class="modal-header">
                                    <h5 class="modal-title font-lg" id="exampleModalLabel"> هل تريد تسليم
                                        {{ $item->title }}
                                    </h5>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                                </div>
                                <div class="modal-body">
                                    <h2 class="font-md">ارفق مجلدات المشروع</h2>
                                    <div>
                                        <label for="upload"> ارفع المشروع :</label>
                                        <input type="file" name="upload" id="file" value="" />
                                    </div>
                                    <div class="col-12 p-2 my-2">
                                        <label for="url">رابط المشروع :</label>
                                        <input class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink' type="url" name="url" id="url" value="" />
                                    </div>
                                    <div>
                                        <input type="checkbox" name="other_option" id="other_option" aria-checked="false" />
                                        <label for="other_option">تم تسليمها بطريقه أخرى </label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="mo-btn btn-pink-bg pink font-md">سلم الان</button>
                                    <button type="button" class="mo-btn btn-blue-bg font-md" data-bs-dismiss="modal">الغاء</button>

                                </div>
                            </form>
                        </div>
                    </div>



                    {{-- reject --}}
                    <div class="modal fade" id="reject_{{ $item->project_id }}" tabindex="-1"
                        aria-labelledby="reject_{{ $item->project_id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModel">تقديم شكوى</h5>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                </div>

                                <div class="model-body px-2">
                                    <form method='POST' action='{{ route('reporting', ['type=project']) }}'>
                                        @csrf
                                        <input hidden type='text' name="seeker_id" value='{{ $item->seeker_id }}' />
                                        <input hidden type='text' name="project_id" value='{{ $item->project_id }}' />
                                        <div class="pt-3">
                                            <label class="my-2">تفاصيل الشكوى <em
                                                    class="text--danger">*</em>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <textarea name="massege" class='form-control' type="text" aria-label="Username" aria-describedby="basic-addon1"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="mo-btn btn-pink-bg pink font-md">ارسال الشكوى</button>
                                            <button type="button" class="mo-btn btn-blue-bg font-md"
                                                data-bs-dismiss="modal">الغاء</button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                                        </div>
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endforeach


    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
        });

        $('#other_option').click(function() {
            if ($('#other_option').is(":checked")) {
                console.log('test');
                $('#file').value = '';
                $('#url').value = '';
            }
        })
    </script>
@endsection
