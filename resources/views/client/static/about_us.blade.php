<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/client/dist/css/tailwind.css">
    <link rel="stylesheet" href="/assets/client/dist/css/main.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Motahh</title>
</head>

<body style="background-color:#f2f2f2;">
    <!-- page warrper -->
    <div class="m-5">
        <!-- start of page -->

        <!-- header -->
        <!-- header -->
        <header class=" w-full bg-primary-blue h-96 shadow-lg border-md text-white overflow-hidden">

            <!-- navigation -->
            <nav x-data="{ isOpen: false }" @keydown.escape="isOpen = false" id='nav'
                class="flex  items-center justify-between md:flex-rowflex-col md:flex-row  w-full h-fit p-3 px-8"
                :class="{ 'shadow-lg flex-col border-md': isOpen, '': !isOpen }">
                <div class=" flex justify-between md:w-fit w-full">
                    <div class="logo-font">
                        <p>متاح</p>
                    </div>
                    <!-- toggle menu  -->
                    <!-- <div class="inline md:hidden cursor-pointer" @click="isNavOpend = !isNavOpend">close</div> -->
                    <button @click="isOpen = !isOpen" type="button"
                        class="block md:hidden px-2 text-gray-500 hover:text-white focus:outline-none focus:text-white"
                        :class="{ 'transition transform-180': isOpen }">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path x-show="isOpen" style='stroke: white; fill: white;' fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                            <path x-show="!isOpen" style='stroke: white; fill: white;' fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                        </svg>
                    </button>
                </div>
                <!-- the nav content -->
                <div :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
                    x-show.transition="true"
                    class="hidden md:flex flex-col md:flex-row mt-10 md:mt-0 w-full h-full md:items-center justify-between">
                    <div class="mx-6 flex-1 mb-10 md:mb-0 ">
                        <ul class="flex flex-col md:flex-row gap-x-4 ">
                            <li class="nav_item font-sm cursor-pointer active_link">
                                <a href="{{ route('home') }}">
                                    الرئسية
                                </a>
                            </li>
                            <li class="nav_item font-sm cursor-pointer">
                                <a href="{{ route('projectlancer') }}">
                                    المشاريع المتاحة
                                </a>
                            </li>
                            <li class="nav_item font-sm cursor-pointer">
                                <a href="{{ route('freelancers') }}">
                                    مقدمي الخدمات
                                </a>
                            </li>
                        </ul>
                    </div>
                    @if (Auth::guest())
                        <div class="flex gap-x-3 ">
                            <a href="{{ route('login') }}"
                                class="mo-btn btn-light-pink-bg p-2 px-6 rounded-full bg-primary-light-pink text-black">
                                تسجيل الدخول
                            </a>
                            <a href="{{ route('create_user') }}" class="mo-btn btn-light-pink-rounderd">
                                حساب جديد
                            </a>
                        </div>
                    @endif
                </div>
            </nav>


            <!-- header content -->
            <div class="flex flex-col md:flex-row h-full w-full">

                <!-- title -->
                <div class="w-12/12 md:w-6/12  sm:mt-8 mx-auto">
                    <div class="flex flex-col  items-center  sm:items-start h-full px-5 md:px-24">
                        <h1 class="logo-font font-4xl" data-aos="fade-up" data-aos-duration="1000">متاح</h1>
                        <p class="mt-4" data-aos="fade-up" data-aos-duration="2000">منصه ابداعيه تجمع بين
                            اصحاب الاعمال والمطور الحر
                            <br />
                            لتسهيل
                            العمل وضمان الحقوق بجوده عاليه وسهوله
                        </p>
                    </div>
                </div>
                <!-- here the illstration illstration -->
                <div class=" relative  w-6/12 hidden md:flex  ">
                    <div class="illstration_warrper w-full h-full">
                        <div class="motaah_illstration">
                            <div class="motaah-circle__gray green white xl"></div>
                            <div class="motaah-circle__gray blue white lg"></div>
                            <div class="motaah-circle__gray white md"></div>
                            <div class="motaah-circle__gray white sm"></div>
                            <div class="motaah-core bg-primary-green"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- <section id="hero" class=" m-3 mt-5 d-flex align-items-center" dir="rtl">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">من نحن</h1>
                    <h2 class="font-xl" data-aos="fade-up"></h2>
                    <h3 class='font-md mt-3 color-gray-dark' data-aos="fade-up" data-aos-delay="400">
                        {{ __('about.about_text') }}</h3>
                    <br>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#"
                                class="wak_btn scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>{{ __('about.read_more') }}</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/client/images/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section> -->


        <section class="">

            <div class="my-16  flex flex-col items-center justify-center">
                <div class="flex flex-col  items-center my-8">
                    <h2 class="font-4xl"> {{ __('about.team') }} </h2>
                </div>
                <!--end row-->

                <div class="flex flex-wrap mx-32 p-8">


                    <div class="col-lg-4 col-md-4 col-12  pt-2 bg-white rounded-3xl mx-6 my-4 p-12"
                        style="width: auto;">
                        <div class="team text-center rounded p-3 py-4">
                            <div class="relative w-24 h-24 mb-32  ">
                                <img class="rounded-full " src="/images/afnan.png" alt="user image" />
                            </div>
                            <div class="content mt-8">
                                <h4 class="title mb-0">Afnan Alkadasi</h4>
                                <small class="text-muted text-primary-blue">Full Stack Developer</small>
                                <ul
                                    class=" flex flex-row items-center justify-center  list-unstyled mt-3 social-icon social mb-0">
                                    <li class="list-inline-item mx-4 font-lg "><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-github border rounded-md p-1 text-gray"
                                                title="Facebook"></i></a></li>

                                    <li class="list-inline-item mx-4 font-lg"><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-linkedin border rounded-md p-1 text-gray"
                                                title="Linkedin"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-4 col-md-4 col-12 pt-2  bg-white rounded-3xl  mx-6 my-4 p-12 "
                        style="width: auto;">
                        <div class="team text-center rounded p-3 py-4">
                            <div class="relative w-24 h-24 mb-32 ">
                                <img class="rounded-full " src="/images/mohammad.png" alt="user image" />
                            </div>
                            <div class="content mt-8">
                                <h4 class="title mb-0">Mohammad </h4>
                                <small class="text-muted text-primary-blue">Full Stack Developer</small>
                                <ul
                                    class=" flex flex-row items-center justify-center  list-unstyled mt-3 social-icon social mb-0">
                                    <li class="list-inline-item mx-4 font-lg "><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-github border rounded-md p-1 text-gray"
                                                title="Facebook"></i></a></li>

                                    <li class="list-inline-item mx-4 font-lg"><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-linkedin border rounded-md p-1 text-gray"
                                                title="Linkedin"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->


                    <div class="col-lg-4 col-md-4 col-12  pt-2 bg-white rounded-3xl  mx-6 my-4 p-12"
                        style="width: auto;">
                        <div class="team text-center rounded p-3 py-4">
                            <div class="relative w-24 h-24 mb-32 ">
                                <img class="rounded-full " src="/images/fatima.png" alt="user image" />
                            </div>

                            <div class="content ">
                                <h4 class="title mb-0">Fatima Ameen</h4>
                                <small class="text-muted text-primary-blue">Full Stack Developer</small>
                                <ul
                                    class=" flex flex-row items-center justify-center  list-unstyled mt-3 social-icon social mb-0">
                                    <li class="list-inline-item mx-4 font-lg "><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-github border rounded-md p-1 text-gray"
                                                title="Facebook"></i></a></li>

                                    <li class="list-inline-item mx-4 font-lg"><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-linkedin border rounded-md p-1 text-gray"
                                                title="Linkedin"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4 col-md-4 col-12  pt-2 bg-white rounded-3xl  mx-6 my-4 p-12"
                        style="width: auto;">
                        <div class="team text-center rounded p-3 py-4">
                            <div class="relative w-24 h-24 mb-32 ">
                                <img class="rounded-full " src="/images/roquia.png" alt="user image" />
                            </div>

                            <div class="content">
                                <h4 class="title mb-0">Ruqaiah Saif</h4>
                                <small class="text-muted text-primary-blue">Full Stack Developer</small>
                                <ul
                                    class=" flex flex-row items-center justify-center  list-unstyled mt-3 social-icon social mb-0">
                                    <li class="list-inline-item mx-4 font-lg "><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-github border rounded-md p-1 text-gray"
                                                title="Facebook"></i></a></li>

                                    <li class="list-inline-item mx-4 font-lg"><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-linkedin border rounded-md p-1 text-gray"
                                                title="Linkedin"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4 col-md-4 col-12  pt-2 bg-white rounded-3xl mx-6 my-4 p-12"
                        style="width: auto;">
                        <div class="team text-center rounded p-3 py-4">
                            <div class="relative w-24 h-24 mb-32  ">
                                <img class="rounded-full " src="/images/doha.png" alt="user image" />
                            </div>

                            <div class="content mt-8">
                                <h4 class="title mb-0">Dhoha Alkorasani</h4>
                                <small class="text-muted text-primary-blue">Full Stack Developer</small>
                                <ul
                                    class=" flex flex-row items-center justify-center  list-unstyled mt-3 social-icon social mb-0">
                                    <li class="list-inline-item mx-4 font-lg "><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-github border rounded-md p-1 text-gray"
                                                title="Facebook"></i></a></li>

                                    <li class="list-inline-item mx-4 font-lg"><a href="javascript:void(0)"
                                            class="rounded"><i
                                                class="fab fa-linkedin border rounded-md p-1 text-gray"
                                                title="Linkedin"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>

        </section>

        <!-- footer -->
        <footer class=" w-full  bg-primary-blue  h-64 shadow-lg border-md text-white overflow-hidden mt-20">
            <!-- header content -->
            <div class="flex flex-col md:flex-row md:justify-between h-full w-full">

                <!-- title -->
                <div class="w-12/12 md:w-6/12">
                    <div class="flex flex-col justify-center h-full px-5 md:px-20">
                        <h1 class="logo-font font-4xl">متاح</h1>
                        <p class="mt-4">منصه ابداعيه تجمع بين اصحاب الاعمال والمطور الحر
                            <br />
                            لتسهيل
                            العمل وضمان الحقوق بجوده عاليه وسهوله
                        </p>
                        <!-- social media -->
                        <div class="flex mt-4 space-x-6  ">
                            <a href="#" class="text-gray-500 mx-6 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="flex flex-wrap items-center mx-12 mt-5  text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="{{ route('aboutUs') }}" class="mr-4 hover:underline md:mr-6 ">بشأننا</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">سياسه الخصوصيه</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs') }}" class="mr-4 hover:underline md:mr-6 ">تواصل معانا</a>
                    </li>

                </ul>

            </div>

        </footer>
        <hr class="my-4 border-gray sm:mx-auto dark:border-primary-light-gray lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-dark-gray">© 2022 <a
                href="https://flowbite.com" class="hover:underline">Motaah</a>. All Rights Reserved.
        </span>
