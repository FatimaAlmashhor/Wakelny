
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">لاستعادة رقمك السري </div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                'تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.'
                            </div>
                        @endif
                        <a href="http://127.0.0.1:8000/reset-password/{{ $token }}">اضغط هنا</a>.
                    </div>
                </div> 
            </div>
        </div>
    </div>

