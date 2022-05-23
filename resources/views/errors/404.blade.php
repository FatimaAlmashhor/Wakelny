@extends('client.master_layout')
@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <div class="bg-white rounded-2xl border shadow-x1 p-10 " style='width:33rem'>
            <div class="flex flex-col items-center space-y-4">
                <h1 class="font-bold text-4xl text-sacondary-red w-4/6 text-center">
                    !! Opps
                </h1>
                </h1>

                <h1 class="font-bold text-2xl text-sacondary-red w-6/6 text-center">

                    الصفحة غير متوفرة

                    </p>

                </h1>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_avwze6mc.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>

                </lottie-player>
                <a href='{{ route('profile') }}' class="mo-btn btn-blue-bg  font-semibold px-4 py-3 w-full" style="text-align: center">

                دعنا ننتقل الى الصفحة السابقة

                </a>
            </div>
        </div>
    </div>
@endsection
