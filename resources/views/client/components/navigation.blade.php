  <!-- header -->
  <header
      class="w-full bg-primary-blue h-fit flex justify-center items-center shadow-lg border-md p-2 px-3 text-white overflow-hidden">

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
                      <li class="nav_item font-sm cursor-pointer active_link">
                          <a href="{{ route('home') }}">
                              الرئسية
                          </a>
                      </li>
                      <li class="nav_item font-sm cursor-pointer">
                          <a href="{{ route('projectlancer') }}">
                              طالبي الخدمات
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

  </header>
