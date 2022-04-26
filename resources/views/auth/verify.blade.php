@extends('client.master_layout')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('قم بتأكيد بريدك الالكتروني') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('أعاده تأكيد البريد الاكتروني تم ارسالها .') }}
                            </div>
                        @endif

                        {{ __('قبل ان تستمر عليك تأكيد بريدك الالكنروني اولا.') }}
                        {{ __('اذ لم تتلقى الرساله بعد أقم بطلب اعاده الارسال') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('ضغط هنا لاعاده رساله التأكيد') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
