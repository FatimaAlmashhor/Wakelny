@extends('client.master_layout')
@section('content')
    <div class="flex items-center justify-center h-screen ">
        <div class=" bg-white rounded-2xl border shadow-x1 p-10 " style="width:33rem;">
            <div class="flex flex-col items-center space-y-4 ">

                <h1 class="font-bold font-4xl text-primary-pink  text-center">

                    OOps!!

                </h1>


                <h1 class="font-bold font-xl text-red-500 w-6/6 text-center">

                    فشلت عملية الدفع
                    </p>

                </h1>



                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets5.lottiefiles.com/private_files/lf30_GjhcdO.json" background="transparent"
                    speed="1" style="width: 300px; height: 300px;" loop autoplay>
                </lottie-player>
                <button class="bg-primary-blue text-white rounded-md  font-semibold px-4 py-3 w-full">

                    انتقل الى الصفحة السابقة
                </button>
            </div>
        </div>
    </div>
@endsection
