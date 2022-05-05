<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title order-2" id="exampleModalLabel">قبول العرض</h5>
                <button type="button" class="btn-close order-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            {{-- model for acceptence --}}
            <form action="{{ route('accept-offer') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $item->provider_id }}" name="provider_id">
                <input type="hidden" value="{{ $item->offer_id }}" name="offer_id">
                <div class="modal-body d-flex">
                    <!-- credit card -->
                    <div class="color-black px-3 modal-panel is-show supSection" id="tab-A">
                        <div class="row">
                            <div class="col-6">
                                <label>المبلغ المتفق عليه <em class="text--danger text-danger">*</em></label>
                                <div class="input-group mt-1">
                                    <input name="amount" class='form-control' id="amount" type="text"
                                        value="{{ old('cost') }}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                @error('amount')
                                    <p class="text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mt-3 d-flex justify-content-between">
                                                                                                                                                                    <div class="col-6">
                                                                                                                                                                        <label>الاسم على البطاقة <em class="text--danger text-danger">*</em> </label>
                                                                                                                                                                        <div class="input-group mt-1">
                                                                                                                                                                            <input name="amount" class='form-control' id="name" type="text"
                                                                                                                                                                                value="{{ old('amount') }}" aria-label="Username"
                                                                                                                                                                                aria-describedby="basic-addon1">
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="col-6">
                                                                                                                                                                        <label>رقم البطاقة <em class="text--danger text-danger">*</em> </label>
                                                                                                                                                                        <div class="input-group mt-1">
                                                                                                                                                                            <input name="amount" class='form-control' id="credit_NO" type="number"
                                                                                                                                                                                value="{{ old('amount') }}" aria-label="Username"
                                                                                                                                                                                aria-describedby="basic-addon1" placeholder=".Card NO">
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>

                                                                                                                                                                <div class="mt-3">
                                                                                                                                                                    <input type="checkbox" class="ms-1" id="remember-card" checked>
                                                                                                                                                                    <label for="#remember-card">احفظ البطاقة لتسهيل الدفع في المستقبل</label>
                                                                                                                                                                </div> -->

                        <div class="row border-top mt-4 py-3">
                            <p>المبلغ النهائي بعد اضافة رسوم إجرائية بنسبة 3% على عملية الدفع: <span
                                    class="color-orange font-lg">3082.50$</span> </p>
                            <p class="text-muted font-xs"><em class="text--danger text-danger">*</em> رسوم عملية الدفع
                                تقتطعها بوابات الدفع الالكترونية مثل PayPal والبطاقات الائتمانية.
                            </p>
                        </div>
                    </div>
                    <!-- /credit card -->

                    <!-- Pay Pal -->
                    <div class="col-12 color-black px-3 modal-panel tab-B supSection" id="tab-B">
                        <div class="row">
                            <section class="card shadow-sm col-12 col-sm-12">
                                <div>

                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- /Pay Pal -->

                    <!-- coupon -->

                    <!-- /coupon -->
                </div>
                <div class="modal-footer d-flex ">
                    <input type="submit" class="btn wak_btn" value="قبول العرض">
                    <button type="button" class="btn wak_btn green_border" data-bs-dismiss="modal">تراجع</button>
                </div>
            </form>
        </div>
    </div>
</div>
