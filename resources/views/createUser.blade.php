@extends('client.master_layout')
@section('content')
    {{-- Header --}}
    <main class="md:px-20 my-20">
        <div class="flex  bg-white border-md  rounded-l-none shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div style='border-right: none;' class="hidden lg:block lg:w-1/2 bg-cover bg-primary-pink ">
                <div class=" relative  w-6/12 hidden md:flex  ">
                    <div class="illstration_warrper w-full h-full">
                        <div class="motaah_illstration"
                            style="top: -44px;
                                                                                                                                        left: 210%;">
                            <div class="motaah-circle__gray green white xl"></div>
                            <div class="motaah-circle__gray blue white lg"></div>
                            <div class="motaah-circle__gray white md"></div>
                            <div class="motaah-circle__gray white sm"></div>
                            <div class="motaah-core bg-primary-green"></div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('save_user') }}" method="POST" class="w-full p-8 lg:w-1/2">
                <h2 class="logo-font  text-center ">متاح</h2>
                <p class="text-lg text-dark-gray text-gray-600 text-center">مرحبا بك !</p>
                <a href="{{ route('loginWithGoogle') }} "
                    class="flex items-center justify-center mt-4 text-white border-sm border border-primary-pink hover:bg-gray-100">
                    <div class=" py-2">
                        <svg class="h-6 w-6" viewBox="0 0 40 40">
                            <path
                                d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                fill="#FFC107" />
                            <path
                                d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                fill="#FF3D00" />
                            <path
                                d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                fill="#4CAF50" />
                            <path
                                d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                fill="#1976D2" />
                        </svg>
                    </div>
                    <h1 class=" w-5/6 text-center text-primary-pink ">سجل عن طريق قوقل</h1>
                </a>
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                    <a href="#" class="text-xs text-center text-gray-500 uppercase">او سجل عن طريق الاميل </a>
                    <span class="border-b w-1/5 lg:w-1/4"></span>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        الاسم كاملا
                    </label>
                    <input
                        class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                        type="text" value="{{ old('name') }}" name='name'>
                </div>
                @error('name')
                    <span class="text-sacondary-red font-sm">{{ $message }}</span>
                @enderror


                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        البريد الاكتروني
                    </label>
                    <input
                        class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                        type="email" value="{{ old('email') }}" name='email'>
                </div>
                @error('email')
                    <span class="text-sacondary-red font-sm">{{ $message }}</span>
                @enderror

                {{-- password --}}
                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block text-gray-700 text-sm font-bold mb-2">كلمه المرور</label>
                    </div>
                    <input
                        class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                        type="password" name="user_pass">
                </div>
                @error('user_pass')
                    <span class="text-sacondary-red font-sm">{{ $message }}</span>
                @enderror

                {{-- confirm password --}}
                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block text-gray-700 text-sm font-bold mb-2"> تأكيد كلمه المرور</label>
                    </div>
                    <input
                        class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                        type="password" name='confirm_pass'>
                </div>
                @error('confirm_pass')
                    <span class="text-sacondary-red font-sm">{{ $message }}</span>
                @enderror
                <div class="mt-6 w-full flex justify-end items-start">
                    <button type='submit'
                        class="mo-btn btn-blue-bg font-bold py-2 px-4  rounded hover:bg-gray-600">أذهب</button>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/4"></span>
                    <a href="{{ route('login') }}" class="text-xs text-gray-500 uppercase">لدي حساب </a>
                    <span class="border-b w-1/5 md:w-1/4"></span>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </main>
@endsection
