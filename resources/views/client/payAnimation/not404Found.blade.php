@extends('client.master_layout')
@section('content')

    <div class="flex items-center justify-center h-screen bg-gray-200">
        <div class="bg-white rounded-2xl border shadow-x1 p-10 w-4/12">
          <div class="flex flex-col items-center space-y-4">
            <h1 class="font-bold text-4xl text-primary-blue w-4/6 text-center">

            404

            </h1>
            </h1>

            <h1 class="font-bold text-2xl  text-primary-blue  text-green-500 w-5/6 text-center">

                خطأ الصفحة غير متوفرة
            </p>

                </h1>



                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_avwze6mc.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
            <button
              class="bg-primary-blue text-white rounded-md  font-semibold px-4 py-3 w-full"
            >

          انتقل الى الصفحة السابقة
            </button>
          </div>
        </div>
      </div>

      @endsection
