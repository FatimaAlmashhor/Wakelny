@extends('client.master_layout')
@section('content')
    <main class="container pt-20">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <h3 class="m-5 font-xl font-bold"> لوحة التحكم</h3>

            </nav>
            <div class="col-6 mt-8">
                <a href="{{ route('userProfile', Auth::user()->id) }}" class="mo-btn btn-blue-bg float-start font-md"><i
                        class="fa fa-user p-1"></i> ملفي الشخصي </a>
            </div>
        </div>
        <!-- top nav end -->

        <!-- side sec -->
        <div class="row">


            <!-- Dashboard Nav Section -->

            @include('client.components.dash_nav')
            <!-- wallet section -->
            <section class="col-lg-8 col-md-8 col-12">
                <div
                    class=" w-12/12 md:w-5/12 mb-10  h-24 flex justify-center items-center font-3xl border rounded-lg shadow-sm bg-white p-3">
                    <span class="font-2xl font-bold text-primary-green px-2">
                        ماتملكه :
                    </span>
                    @if ($wallet != null)
                        ${{ $wallet->balance }}
                    @endif
                </div>
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="font-md">الرقم</th>
                            <th class="font-md">المسلم </th>
                            {{-- <th class="font-md">المستلم</th> --}}
                            <th class="font-md">المبلغ </th>
                            <th class="font-md">المشروع </th>
                            <th class="font-md">التاريخ</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach ($transactions as $tran)
                            <tr>
                                <td class="font-md">{{ $loop->iteration }}</td>
                                <td class="font-md">{{ $tran->name }}</td>
                                <td class="font-md">{{ $tran->dep_amount }}</td>
                                {{-- <td class="font-md">{{ $tran->with_amount }}</td> --}}
                                <td class="font-md">{{ $tran->title }}</td>
                                <td class="font-md">{{ $tran->created_at }}</td>
                                {{-- <td class="font-md">{{ $item->meta['seeker_id'] }}</td> --}}
                                {{-- <td class="font-md">{{ $item->meta['project_id'] }}</td> --}}
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </section>
        </div>

    </main>
@endsection
