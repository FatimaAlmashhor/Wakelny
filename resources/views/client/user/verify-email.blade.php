@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center ">
                <div class="col-md-6 col-lg-5 ">
                    <div class="login-wrap p-4 p-md-5 border shadow-sm my-5 wak_form">

                        <div class="container ">
                            <div class="row justify-content-center  ">
                                <div class="col-md-8">

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <h3>لم يتبقى الكثير </h3>
                                    <p>رجاء قم بتأكيد البريد الاكتروني اولا لتتمكن من البدأ</p>
                              <!------------------Animation image verify-Email-------->
                                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_rngupejb.json"  background="transparent"  speed=".5"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>

                                    <form action="{{ route('verification.request') }}" method="post"
                                        class="my-4">
                                        @csrf
                                        <button class='mo-btn' type="submit">اضفط هنا لاعاده الارسال</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
