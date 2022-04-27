@extends('client.master_layout')
@section('content')
    {{-- Contact Us --}}
    <section class="contact_warrper">
        <div class="contact-form">
            <div class="first-container">
                <div class="info-container">
                    <div><img class="icon" />
                        <h3>الموقع</h3>
                        <p>من ممزلك انطلع </p>
                    </div>
                    <div> <img class="icon" />
                        <h3>اتصل بنا عبر</h3>
                        <p>+967-774-345-344</p>
                    </div>
                    <div><img class="icon" />
                        <h3>بريدنا الاكتروني</h3>
                        <p>kalefnyinfo@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="second-container">
                <h2>تواصل معنا</h2>
                <form>
                    <div class="form-group">
                        <label for="name-input">اخبرنا عن اسمك*</label>
                        <input id="name-input" type="text" placeholder="First name" required="required" />
                        <input type="text" placeholder="Last name" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="email-input">ادخل البريد الاكتروني*</label>
                        <input id="email-input" type="text" placeholder="Eg. example@email.com" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="phone-input">ادخل رقم الهاتف*</label>
                        <input id="phone-input" type="text" placeholder="Eg. +1 800 000000" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="message-textarea">تحدث معنا</label>
                        <textarea id="message-textarea" placeholder="Write us a message"></textarea>
                    </div>
                    <button class="wak_btn"> ارسال</button>
                </form>
            </div>
        </div>
    </section>
@endsection
