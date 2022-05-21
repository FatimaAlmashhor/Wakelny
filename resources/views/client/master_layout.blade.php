<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Most Powerful &amp; Comprehensive freelance platform !" />
    <meta name="keywords" content="freelace, developer , controll, skills">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    {{-- css links --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
        integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/client/css/main.css">


    <link href="/assets/client/css/about.css" rel="stylesheet">
    <link href="/assets/client/css/post.css" rel="stylesheet">




    <script src="/assets/client/js/helper/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet"
        media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>


    {{-- <link rel="stylesheet" href="./dist/css/tailwind.css"> --}}
    <link rel="stylesheet" href="/assets/client/dist/css/tailwind.css">
    <link rel="stylesheet" href="/assets/client/dist/css/main.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <title>متاح</title>
    @livewireStyles
    {{-- //paste this code under the head tag or in a separate js file.
	// Wait for window load --}}
    <script type='text/javascript'>
        $(window).load(async function() {
            // Animate loader off screen
            await setTimeout(() => {
                $("#loading").addClass("circle-leave-active");
                $("#loading").fadeOut("slow");
            }, 2300);
        });
    </script>
</head>

<body>
    <div id='loading' class=" fixed flex justify-center items-center bg-primary-light-gray w-screen h-screen z-50"
        style="z-index: 2000">
        <div class="ripple"></div>
    </div>

    {{-- alerts --}}
    @if (session()->has('message'))
        <div id='alert' x-data="{ isShow: true }" class="z-50  " style="z-index: 99999">
            <div x-show="isShow" class="fixed top-32 right-0 m-3 w-2/3 md:w-1/3"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition transform ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
                <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
                    {{-- <svg class="flex-shrink-0 h-6 w-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1"
                            d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03">
                        </path>
                    </svg> --}}
                    <div class="flex-1 space-y-1">
                        {{-- <p class="text-base leading-6 font-medium text-gray-700">Successfully saved!</p> --}}
                        <p class="text-sm leading-5 text-gray-600"> {{ session()->get('message') }}</p>
                    </div>
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false"
                        stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1.2"
                            d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    @endif
    <div class="m-5">
        @include('client.components.navigation')
        <div class="sm:px-16 lg:px-18">
            @yield('content')
        </div>
        @include('client.components.footer')

        <!-- client fixed nav -->
        @if (Auth::check() && !Auth::user()->hasRole('admin'))
            <div class="flex justify-center items-center w-full h-fit bg-primary-blue">
                <nav
                    class=" fixed bottom-9 py-5 w-fit h-14 border-2 border-white shadow-lg rounded-full bg-primary-light-pink z-50">
                    <div class="w-full h-full p-2  flex justify-center items-center gap-x-5 pr-5">
                        <a href="{{ route('profile') }}" class="">

                            <ion-icon name="person-outline"
                                class=" font-md cursor-pointer {{ request()->segment(2) == 'controllPannal' ? 'active_fixed_nav' : '' }}">
                            </ion-icon>
                        </a>
                        @if (Auth::check())
                            @role('seeker')
                                <a href="{{ route('post') }}" class="  ">
                                    <ion-icon name="document-outline"
                                        class=" font-md cursor-pointer {{ request()->segment(2) == 'post' ? 'active_fixed_nav' : '' }}">
                                    </ion-icon>
                                </a>
                            @endrole
                        @endif

                        @if (Auth::check())
                            @role('provider')
                                <a href="{{ route('userWork') }}">
                                    <ion-icon name="briefcase-outline"
                                        class="font-md cursor-pointer {{ request()->segment(2) == 'userWork' ? 'active_fixed_nav' : '' }}">
                                    </ion-icon>
                                </a>
                            @endrole
                        @endif
                        @if (Auth::check())
                            <a href="{{ route('mywallet') }}">
                                <ion-icon name="wallet-outline"
                                    class="font-md cursor-pointer {{ request()->segment(2) == 'mywallet' ? 'active_fixed_nav' : '' }}">
                                </ion-icon>

                            </a>
                        @endif
                        <!-- start drop up -->
                        <div class="flex items-center">
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <div class="relative">
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="bottom-0 origin-top-right absolute left-0 mt-2 -mr-1 w-48 rounded-md shadow-lg">
                                        <div class="py-1 rounded-md bg-white shadow-xs relative">

                                            @if (Auth::check())
                                                @role('provider')
                                                    <a href="{{ route('workonProject') }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                                        اعمل على</a>
                                                    <a href="{{ route('myWorks') }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                                        اعمالي</a>
                                                @endrole
                                            @endif

                                            @if (Auth::check())
                                                @role('seeker')
                                                    <a href="{{ route('myProject') }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                                        مشاريعي</a>
                                                @endrole
                                            @endif
                                            <a href='{{ route('logout') }}'
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition ease-in-out duration-150">
                                                تسجيل الخروج
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                    <div @click="open = !open" class="border-r my-2 border-r-primary-light-gray ">
                                        <div
                                            class="w-15 h-15 flex justify-center  text-white items-center py-3 px-3 rounded-xl m-2  bg-primary-blue cursor-pointer hover:bg-primary-light-pink  hover:text-primary-blue">
                                            <ion-icon name="chevron-back-outline" class=" "></ion-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end drop up -->

                        <!-- <div
                    class="rounded-full mr-1 w-fit h-12 bg-primary-green  border-2 border-white text-white font-sm flex justify-center items-center p-3 ">
                    اضف عمل
                  </div> -->

                    </div>
                </nav>
            </div>
        @endif
        <!-- admin fixed nav -->
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <div class="flex justify-center items-center w-full h-fit bg-primary-blue">
                <nav
                    class=" fixed bottom-9 py-5 w-fit h-14 border-2 border-white shadow-lg rounded-full bg-primary-light-pink z-50">
                    <div class="w-full h-full p-2  flex justify-center items-center gap-x-5 pr-5">
                        <div class="">
                            <ion-icon name="person-outline" class="font-md cursor-pointer hover:text-primary-pink">
                            </ion-icon>
                        </div>
                        <div class=" mx-3 ">
                            <ion-icon name="document-outline" class="font-md cursor-pointer hover:text-primary-pink">
                            </ion-icon>
                        </div>
                        <a href='{{ route('logout') }}' class=" mx-3 ">
                            <ion-icon name="document-outline" class="font-md cursor-pointer hover:text-primary-pink">
                            </ion-icon>
                        </a>

                    </div>
                </nav>
            </div>
        @endif
    </div>

    {{-- scripts - --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



    <script src="/assets/client/js/helper/jquery-3.6.0.min.js"></script>
    <script src="/assets/client/js/helper/bootstrap.min.js"></script>
    <script src="{{ asset('assets/client/js/profile/profile.js') }}"></script>
    <script src="{{ asset('assets/client/js/report.js') }}"></script>
    {{-- <script src="{{ asset('assets/client/js/profile/phone.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
        integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });
        const notify = document.getElementById('notify');
        const notifyMark = document.getElementById('notify-mark');
        var channel = pusher.subscribe('channel-name');
        console.log(channel);
        channel.bind('App\\Events\\CommentEvents', function(data) {
            // alert(data.userId);
            if (data.userId.toString() == "{!! Auth::id() !!}") {
                // const audio = new Audio(url);
                // audio.play();
                notifyMark.classList.remove('hidden');
                const node = document.createElement("a");
                node.href = data.url;
                node.className =
                    "rounded text-black bg-gray-200 my-2 hover:bg-primary-light-pink  border border-primary-light-gray  py-2 px-4 block whitespace-no-wrap hover:text-black"
                const textnode = document.createTextNode(data.message);
                node.appendChild(textnode);
                notify.prepend(node);
                console.log(notify);
            }

        });
    </script>

    @stack('scripts')
    <script>
        // $('#alert').slideIn(300).delay(5000).fadeOut(400);
        $('#alert').animate({
            right: '10px'
        }).delay(6000).fadeOut(400);
        if (window.navigator.onLine) {
            //has internet connection
            console.log('connected');
        }
        // $('.mo-btn').on('click', function() {
        //     $('.mo-btn').attr("disabled", true);
        //     $('.mo-btn').addClass("bg-gray");
        // })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @livewireScripts


</body>

</html>
