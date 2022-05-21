@extends('client.master_layout')
@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-200">
        <div class="bg-white rounded-2xl border shadow-x1 p-10 " style='width:33rem'>
            <div class="flex flex-col items-center space-y-4">
                <h1 class="font-bold text-4xl text-purple-900 w-4/6 text-center">

                    تهانينا

                </h1>
                </h1>

                <h1 class="font-bold text-2xl text-green-500 w-6/6 text-center">

                    تمت عملية الدفع بنجاح
                    </p>

                </h1>



                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_ul4trcgf.json"
                    background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                </lottie-player>
                <a href='{{ route('profile') }}' class="bg-primary-blue text-white rounded-md  font-semibold px-4 py-3 w-full text-center">

                    دعنا ننتقل الى الصفحة التالية
                </a>
            </div>
        </div>
    </div>
@endsection
