@extends('client.master_layout')
@section('content')
    {{-- Contact Us --}}
    <section class="dir" class="text-dark text-center text-sm-start  py-5">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">

                <form class="row g-3 mt-5">
                    <h3>تواصل معنا</h3>


                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label" for="emailAddress">الايميل</label>
                        <input class="form-control" id="emailAddress" type="email" placeholder="example@gmail.com"
                            data-sb-validations="required, email" />

                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label" for="message">الرسالة</label>
                        <textarea class="form-control" id="message" type="text" placeholder="" style="height: 10rem;"
                            data-sb-validations="required"></textarea>
                    </div>



                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg wak_btn" type="submit">ارسال</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
