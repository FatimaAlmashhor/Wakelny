  <!-- header -->
  <header class="w-full bg-primary-blue h-fit flex justify-center items-center shadow-lg border-md p-2 px-3 text-white ">

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
                      <path x-show="isOpen" style='stroke: white; fill: white;' fill-rule="evenodd" clip-rule="evenodd"
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
                      <li
                          class="nav_item font-sm cursor-pointer {{ request()->segment(2) == '' ? 'active_link' : '' }}">
                          <a href="{{ route('home') }}">
                              الرئسية
                          </a>
                      </li>

                      <li
                          class="nav_item font-sm cursor-pointer {{ request()->segment(2) == 'posts' ? 'active_link' : '' }}">
                          <a href="{{ route('projectlancer') }}">
                              المشاريع المتاحه
                          </a>
                      </li>

                      <li
                          class="nav_item font-sm cursor-pointer {{ request()->segment(2) == 'freelancers' ? 'active_link' : '' }}">
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
              @if (Auth::check() && !Auth::user()->hasRole('admin'))
                  <div @click.away="open = false" class="relative" x-data="{ open: false }">
                      <button @click="open = !open"
                          class="flex flex-row items-center w-full px-3 py-1 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:mt-0 md:ml-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                          <span class="text-lg text-primary relative"><i class="fas fa-bell text-white"></i>
                              <span id='notify-mark'
                                  class=" hidden w-3 h-3 bg-primary-pink left-2 rounded-full absolute"></span></span>
                      </button>
                      <div x-show="open" x-transition:enter="transition ease-out duration-100"
                          x-transition:enter-start="transform opacity-0 scale-95"
                          x-transition:enter-end="transform opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-75"
                          x-transition:leave-start="transform opacity-100 scale-100"
                          x-transition:leave-end="transform opacity-0 scale-95"
                          class="absolute left-0 w-full mt-2 origin-top-right  rounded-md shadow-lg z-50 md:w-96"
                          style='z-index: 19999;'>
                          <div class="px-2 py-2 bg-white rounded-md shadow " id='notify'>
                              @foreach (auth()->user()->unreadNotifications as $notification)
                                  <a class="rounded text-black bg-gray-200 my-2 hover:bg-primary-light-pink  border border-primary-light-gray  py-2 px-4 block whitespace-no-wrap hover:text-black"
                                      href="{{ $notification->data['url'] }}">
                                      {{ $notification->data['message'] }}
                                  </a>
                              @endforeach
                          </div>
                      </div>
                  </div>
                  <a class="flex items-center px-3 py-1 mt-2 text-lg font-semibold text-primary rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                      href="{{ route('inbox.index') }}">
                      <i class="fas fa-envelope text-white"></i>
                  </a>
              @endif
          </div>
      </nav>

  </header>
