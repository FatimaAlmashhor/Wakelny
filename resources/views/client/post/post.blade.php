@extends('client.master_layout')
@section('content')
    <div class="container">
        <p class="font-xl my-5 "> إضافة مشروع</p>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12 bg-light">
                <form id="contactForm" class="row g-3">

                    <!-- Name input -->
                    <div>
                        <label class="form-label" for="name">عنوان المشروع</label>
                        <input class="form-control" id="name" type="text" data-sb-validations="required" />
                        <p class="text-muted font-sm">أدرج عنوانا موجزا يصف مشروعك بشكل دقيق.</p>
                    </div>

                    <!-- Email address input -->
                    <div>
                        <label class="form-label" for="emailAddress">المهارات المطلوبة</label>
                        <input class="form-control" id="emailAddress" type="email" data-sb-validations="required, email" />
                        <p class="text-muted font-sm">حدد أهم المهارات المطلوبة لتنفيذ مشروعك.</p>
                    </div>

                    <!-- Message input -->
                    <div>
                        <label class="form-label" for="message">تفاصيل المشروع</label>
                        <textarea class="form-control" id="message" type="text" style="height: 10rem;"
                            data-sb-validations="required"></textarea>
                        <p class="text-muted font-sm">أدخل وصفاً مفصلاً لمشروعك وأرفق أمثلة لما تريد ان أمكن.</p>

                    </div>
                    <div class="col-sm-6 col-xs-12 pt-3">
                        <div class="form-group  ">
                            <label>الميزانية المتوقعة <em class="text--danger">*</em>
                            </label>
                            <select class="form-select" aria-label="Default select example" name="country"
                                required="required">
                                <option> </option>
                                <option>50-25 دولار </option>
                                <option>100-50 دولار </option>
                                <option>250-100 دولار </option>
                                <option>500-250 دولار </option>
                                <option>1000-500 دولار </option>
                                <option>2500-1000 دولار </option>
                                <option>5000-2500 دولار </option>
                                <option>10000-5000 دولار </option>


                            </select>
                            <p class="text-muted font-sm">اختر ميزانية مناسبة لتحصل على عروض جيدة
                        </div>

                    </div>

                    <div class="col-sm-6 col-xs-12 pt-3">

                        <label>المدة المتوقعة للتسليم <em class="text--danger">*</em>
                        </label>
                        <div class="input-group mb-3">

                            <input name="days" class='form-control' id="phone" type="text" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <span class="input-group-text" id="basic-addon1">ايام</span>
                        </div>

                        <span class="text-muted font-sm">متى تحتاج استلام مشروعك</span>


                    </div>
                    <div class="mb-1">
                        <label class="form-label" for="message">ملفات توضيحية</label>
                        <input class="form-control" id="message" type="file" data-sb-validations="required">


                    </div>

                    <!-- Form submit button -->
                    <div>
                        <button class="wak_btn " type="submit">انشر الان
                            </button>

                </form>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <h6>أنشر مشروعك على كلفني</h6>
            <p>تساعدك منصة كلفني على الوصول إلى أفضل
                المستقلين المحترفين لإنجاز أعمالك عن بعد
                . بعد إضافة مشروعك على نفذلي ومراجعته ،
                سيتقدم إليك عدد من العروض من المستقلين
                المتخصيين يمكنك إختيار العرض
                الأنسب لك من العروض المقدمة وإعتماده</p>

            <h6> <i class="fa-solid fa-lightbulb p-2 color-green"></i>نصائح إضافة المشروع</h6>
            <ul>
                <li><i class="fa-duotone fa-caret-left color-green p-1"></i>أدخل تفاصيل المشروع بدقة</li>
                <li><i class="fa-duotone fa-caret-left color-green p-1"></i>املأ جميع الحقول ووفّر أمثلة لما تريد
                </li>
                <li><i class="fa-duotone fa-caret-left color-green p-1"></i>جزّء المشروع على عدّة مراحل صغيرة
                </li>
            </ul>

        </div>

    </div>
    </div>
@endsection
