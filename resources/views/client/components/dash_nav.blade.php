<div class="col-lg-4 col-md-4 col-12 mb-3">
    <div class="card  p-3 pt-0 bg-opacity-0 ">
        <!-- user avatar -->
        <div class="col-12  d-flex justify-content-center align-items-center p-4 ">
            <div class="profile-card--avatar shadow-sm border rounded-circle position-relative"
                style="width: 230px ; height: 230px;">
                @if ($item->avatar !== 'http://localhost:8000/images/')
                    <img src="{{ $item->avatar }}" class="profile-avatar position-absoulte"
                        style="width: 100%; height:100%; object-fit: cover">
                @else
                    <img src="{{ asset('assets/client/images/user-profile-2.png') }}"
                        class="profile-avatar position-absoulte" style="width: 100%; height:100%; object-fit: cover">
                @endif

            </div>
            {{-- <a role="button" data-bs-toggle="" data-bs-target="" href="/user-account"
                class="position-absolute bg-white border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle"
                style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-pencil-square " viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
            </a> --}}
        </div>
        <!-- name -->
        <div class="text-center">
            <a class="text-prof fs-5 font-lg fw-bold " href="">{{ $item->name }}</a>
            <p class="my-2 border-top  mb-3"></p>
            <a class=" font-md w-full " href='{{ route('account') }}'>تعديل معلومات الحساب</a>
        </div>
    </div>

    <!-- dashboard nav -->
    <div class="card account p-3 my-4 pt-0 bg-opacity-0">
        <nav class="card px-3 py-4 mt-3 d-flex gap-3">
            <a href='{{ route('profile') }}' id="personal" style="cursor: pointer"
                class="text-prof d-flex align-items-center d-inline-block ms-3 border-bottom pb-2">
                <i class="fa fa-user pe-2"></i>
                <span class="fs-6 font-md fw-bold mx-4">{{ __('profile.Personal_Info') }}</span>
            </a>
            <a id="skill" href='{{ route('skills') }}'
                class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2">
                <i class="fa fa-object-group pe-2"></i>
                <span class="fs-6 font-md fw-bold mx-4">{{ __('profile.skills') }}</span>
            </a>

            <a style="cursor: pointer" id="note" href='{{ route('mywallet') }}'
                class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2">
                <i class="fa  fa-wallet pe-2"></i>
                <span class="fs-6 font-md fw-bold mx-4">{{ __('profile.wallet') }}</span>
            </a>


        </nav>


    </div>
    <!-- dashboard nav -->
    {{-- <div class="card  p-3 pt-0 bg-opacity-0"> --}}
    {{-- <nav class="card px-3 py-4 mt-3 d-flex gap-3">
            <h5 class="border-bottom my-2 pb-2" style="color:rgba(77, 212, 172, 1);">خطوات إكمال الحساب</h5>
            <div class="mx-2 px-2">
                <a href="#">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                    تأكيد رقم الجوال
                </a>
            </div>

            <div class="mx-2 px-2">
                <a href="#">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                    إضافة المهارات
                </a>
            </div>
            <div class="mx-2 px-2">
                <a href="#">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">

                    إضافة أعمال جديدة

                </a>
            </div>


        </nav>
    </div> --}}
</div>



{{-- <section class="col-lg-8 col-md-8 col-12" id="Edu">
    <div class="card p-3">


        <div class="card-body">
            <div class="card-header my-2 d-flex justify-content-between align-items-center">
                <h5 class="fs-5 " style="color:rgba(77, 212, 172, 1);">{{ __('profile.notifacations1') }}
                </h5>
            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note1') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note2') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note3') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note4') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note5') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note6') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note7') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note8') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note9') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note10') }}

            </div>
            <div class="card-header my-2 d-flex justify-content-between align-items-center">
                <h5 class="fs-5 " style="color:rgba(77, 212, 172, 1);">{{ __('profile.notifacations2') }}
                </h5>
            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note11') }}

            </div>
            <div class="mx-2 my-2 px-2">

                <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">

                {{ __('profile.note12') }}

            </div>

        </div>
        <hr>

        <div class="row col-md-8  ">

            <button class="wak_btn " type="submit">Save</button>

        </div>
</section> --}}
