<div class=" d-flex ">
            <div class="mx-4 border-start">
                <form class="filter" id='filter' method="GET">
                    {{ csrf_field() }}
                    <input name="_token" type="hidden" />
                    <div class="filter_container">
                        <a href="javascript:void(0)" id='filter_close' class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a>
                            <div class="container-fluid ">
                                <div class="row d-flex justify-content-start">
                                    <div class="">
                                        <div class="">
                                            <article class="filter-group">
                                                <h6 class="title font-md color-gray-dark">{{ __('filter.search_keys') }} </h6>
                                                <div style="">
                                                    <div class="card-body">
                                                        <input type="text" wire:model="searchTerm" name='search_by_keys'
                                                            class="wak_input" />
                                                    </div>
                                                </div>
                                            </article>
                                            {{-- categories --}}
                                            <article class="filter-group">
                                                <h6 class="title font-md color-gray-dark">{{ __('filter.majers') }} </h6>
                                                @foreach ($categories as $type)
                                                    <div style="">
                                                        <div class="card-body d-flex align-items-center ">
                                                            <label class="wak_checkbox">
                                                                <input value="{{ $type->id }}" wire.model="selectedtypes"  name='categories[]' type="checkbox" class="categories" id="{{ $type->id }}">
                                                                <span class=" checkmark"></span>
                                                            </label>
                                                            <p class="my-auto px-2"> {{ $type->title }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </article>
                                            <article class="filter-group">
                                                <h6 class="title font-md color-gray-dark">{{ __('filter.skill') }} </h6>
                                                <div style="mt-2">
                                                    <select class="combobox wak_input" name="normal">
                                                        <option value="" selected="selected">اختر المهارة </option>
                                                        <option value="AL">فتشوب</option>
                                                        <option value="AK">تصميم الجرافيك</option>
                                                        <option value="AZ">illustrator</option>
                                                    </select>
                                                </div>
                                            </article>
                                            <article class="filter-group">
                                                <h6 class="title font-md color-gray-dark">{{ __('filter.time') }} </h6>
                                                <div style="">
                                                    <div class="card-body d-flex align-items-center ">
                                                        <label class="wak_checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="my-auto px-2"> أقل من أسبوع واحد</p>
                                                    </div>
                                                </div>
                                                <div style="">
                                                    <div class="card-body d-flex align-items-center ">
                                                        <label class="wak_checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="my-auto px-2"> من 1 إلى 2 أسابيع
                                                        </p>
                                                    </div>
                                                </div>
                                                <div style="">
                                                    <div class="card-body d-flex align-items-center ">
                                                        <label class="wak_checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="my-auto px-2"> أمن 2 أسابيع إلى شهر
                                                    </div>
                                                </div>
                                                <div style="">
                                                    <div class="card-body d-flex align-items-center ">
                                                        <label class="wak_checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="my-auto px-2"> أكثر من 3 أشهر
                                                        </p>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="filter-group">
                                                <h6 class="title font-md color-gray-dark">{{ __('filter.balance') }} </h6>
                                                <div style="">
                                                    <div class="card-body d-flex align-items-center ">
                                                        <label class="wak_checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="my-auto px-2"> أقل من أسبوع واحد</p>
                                                    </div>
                                                </div>
                                                <form>
                                                    <label for="formControlRange">Example Range input</label>
                                                    <div class="form-group">
                                                        <input type="range" class="form-control-range" id="formControlRange">
                                                    </div>
                                                </form>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div  id='freelancers' class="col-md-8 mx-2 ">
            @include('client.components.posts_data')
            </div>
        </div>
    </div>