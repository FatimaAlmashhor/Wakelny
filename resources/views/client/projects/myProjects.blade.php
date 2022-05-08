@extends('client.master_layout')
@section('content')
    <h3 class="m-5"> المشاريع اللتي اعمل عليها حاليه </h3>
    @foreach ($data as $item)
        {{-- one card --}}
        <div class="row d-flex flex-column justify-content-center">
            <div class="mx-5 col-lg-6">
                <div class="container  card px-3 my-3 ">

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


                                    @if ($item->status == 'at_work')
                                        <a tabindex="-1" class="wak_btn border-green" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="fa-regular fa-paper-plane"></i>

                                            <span class="action-text">تسليم المشروع </span>

                                        </a>
                                    @else
                                        <button tabindex="-1" class="wak_btn orange" aria-disabled="true">
                                            <i class="fa-solid fa-spinner"></i>
                                            <span class="action-text"> انتظار الرد... </span>

                                        </button>
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
                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="{{ route('markAsDone') }}">
                        @csrf
                        <input type="hidden" value='{{ $item->project_id }}' name='project_id' />
                        <input type="hidden" value='{{ $item->seeker_id }}' name='seeker_id' />
                        <div class="modal-header">
                            <h5 class="modal-title font-lg" id="exampleModalLabel"> هل تريد تسليم {{ $item->title }} </h5>
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
                                <input type="url" name="url" id="url" value="" />
                            </div>
                            <div>
                                <input type="checkbox" name="other_option" id="other_option" aria-checked="false" />
                                <label for="other_option">تم تسليمها بطريقه أخرى </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">سلم الان</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>

                        </div>
                        {{ csrf_field() }}
                    </form>
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
            if ($('#other_option').checked) {
                console.log('test');
                $('#file').value = '';
                $('#url').value = '';
            }
        })
    </script>
@endsection
