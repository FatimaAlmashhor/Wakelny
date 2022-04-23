@extends('client.master_layout')
@section('content')

    <main class="container">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
              <ol class="breadcrumb ms-3" >
                <li class=" fs-6 fw-bold"><a href="{{route('home')}}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{route('account')}}"> تغيير إعدادات الحساب </a></li>
              </ol>
              
            </nav>
        </div>
         <!-- top nav end -->

        <!-- side sec -->
        <div class="row">
            <!-- Dashboard Nav Section -->
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <div class="card shadow p-3 pt-0 bg-opacity-0 ">
                    <!-- user avatar -->
                    <div class="col-12  d-flex justify-content-center align-items-center p-4 position-relative">
                        <img src="/assets/client/images/user-profile-2.png"
                            class="user-avatar img-fluid rounded-circle"
                            alt="user avatar"style="width: 70%;"/>  
                        <a role="button" data-bs-toggle="modal"data-bs-target="#avatar-edit-model"
                                class="position-absolute bg-white border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle" 
                                style="bottom: 10%;left: 35%; width: 30px;height: 30px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square " viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </div>
                    <!-- name -->
                            <div class="text-center">
                            <a class="text-prof fs-5 fw-bold border-bottom " href="">Afnan Alkadasi</a>
                            <p class="my-2">Full Stack Developer</p>
                            </div>
                </div>

                  <!-- dashboard nav -->
                <div class="card shadow p-3 my-4 pt-0 bg-opacity-0">
                    <nav class="card px-3 py-4 mt-3 d-flex gap-3">
                        <a
                            href="#" id="personal"
                            class="text-prof d-flex align-items-center d-inline-block ms-3 border-bottom pb-2"
                        >
                            <i class="fa fa-user pe-2"></i>
                            <span class="fs-6 fw-bold mx-4">{{ __('profile.Personal_Info') }}</span>
                        </a>
                        <a
                            href="#" id="skill"
                            class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2"
                        >
                            <i class="fa fa-object-group pe-2"></i>
                            <span class="fs-6 fw-bold mx-4">{{ __('profile.skills') }}</span>
                        </a>

                        <a
                            href="#" id="note"
                            class="text-secondary d-flex align-items-center d-inline-block ms-3 border-bottom pb-2"
                        >
                            <i class="fa fa-book pe-2"></i>
                            <span class="fs-6 fw-bold mx-4">{{ __('profile.notifacation') }}</span>
                        </a>

               
                    </nav> 
          

                </div>
                  <!-- dashboard nav -->
                  <div class="card shadow p-3 pt-0 bg-opacity-0">
                    
                    <nav class="card px-3 py-4 mt-3 d-flex gap-3">
                    <h5 class="border-bottom my-2 pb-2" style="color:rgba(77, 212, 172, 1);">خطوات إكمال الحساب</h5>
                    <div class="mx-2 px-2" >
                    <a  href="#">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        
                            تأكيد رقم الجوال
                            </a>
                    </div>
                
                        <div class="mx-2 px-2" >
                        <a  href="#">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        
                        إضافة المهارات
                        </a>
                    </div>
                    <div class="mx-2 px-2" >
                       <a  href="#">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        
                        إضافة أعمال جديدة
                  
                       </a>
                    </div>

               
                    </nav>
                </div>
        </div>
 
              <!-- info Section -->
            <section class="col-lg-8 col-md-8 col-12" id="perso">
               
              <div class="card shadow p-3">
                 
    
                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                  <h3 class="fs-5" style="color:rgba(77, 212, 172, 1);">{{ __('profile.Personal_Info') }}</h3>
                </div>
               <div class="content">
                    <div class="container text-left">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                            
                                <!-- <select name="basic[]" multiple="multiple" class="3col active form-control">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select> -->
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">{{ __('profile.type') }}</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <div class="mx-2 my-2 px-2" >
                        
                        <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                        
                      <strong>  {{ __('profile.person1') }}</strong>
                      (أبحث عن مستقلين لتنفيذ مشاريعي)
                            </div>
                            <div class="mx-2 my-2 px-2" >
                       
                            <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                            
                            <strong>   {{ __('profile.person2') }}</strong>
                            (أبحث عن مشاريع لتنفيذها)
                                                <div class="mx-2 my-2 px-2" >
                                        
                                        <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                        
                                        <strong>    {{ __('profile.person21') }}</strong>
                                        (ازالة هذه الاشارة سيخفي حسابك بشكل مؤقت من نتائج البحث)
                                            </div>
                             </div>
                      </div>
                    </div>
                  
                    <div class="row">
                        
                        <div class="col-md-6">
                        <label for="" class="col-md-6 col-form-label"> {{ __('profile.person3') }}</label>
                        <select name=""  class="form-control">
                                    <option value="AL">
هندسة، عمارة وتصميم داخلي</option>
                                    <option value="AK">برمجة</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                        <label for="" class="col-md-6 col-form-label"> {{ __('profile.person4') }}</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword">
                                </div>
                        </div>
                     
                    </div>
                  
                    <div class="row">
                        
                        <label for="" class="col-md-6 col-form-label"> {{ __('profile.person5') }}</label>
                            <textarea class="form-control" placeholder=" {{ __('profile.person5') }}" id="floatingTextarea"></textarea>
                   
                    </div>

                    <div class="row">
                        
                        <label for="" class="col-md-12 col-form-label"> {{ __('profile.person6') }}</label>
                        <input type="text" class="form-control" id="inputPassword">
                   
                    </div>
                   
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="" href="#">Save</a>
                    </div>
                  </div>
              </div>
              
            </section>


            <!-- skill section -->
            <section class="col-lg-8 col-md-8 col-12" id="expe">
         
       
              <div class="card p-3">
                  
              <div  class="card-header bg-transparent d-flex justify-content-between align-items-center">
                <h3 class=" fs-5" style="color:rgba(77, 212, 172, 1);">{{ __('profile.skills') }}</h3>
                </div>
              
             
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{ __('profile.skill1') }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingtwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo">
                                    {{ __('profile.skill2') }}
                                </button>
                            </h2>
                            <div id="flush-collapsetwo" class="accordion-collapse collapse" aria-labelledby="flush-headingtwo"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingthree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsethree" aria-expanded="false" aria-controls="flush-collapsethree">
                                    {{ __('profile.skill3') }}
                                </button>
                            </h2>
                            <div id="flush-collapsethree" class="accordion-collapse collapse" aria-labelledby="flush-headingthree"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                    {{ __('profile.skill4') }}
                                </button>
                            </h2>
                            <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                                    {{ __('profile.skill5') }}
                                </button>
                            </h2>
                            <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                                    {{ __('profile.skill6') }}
                                </button>
                            </h2>
                            <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingseven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                                    {{ __('profile.skill7') }}
                                </button>
                            </h2>
                            <div id="flush-collapseseven" class="accordion-collapse collapse" aria-labelledby="flush-headingseven"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                                    <code>.accordion-flush</code> class. This is the first item's accordion body.
                                </div>
                            </div>
                        </div>
                    </div> 
                    <hr>
                    <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="" href="#">Save</a>
                    </div>
                  </div>
            </section>

            
            <section class="col-lg-8 col-md-8 col-12" id="Edu">
              <div class="card p-3">
                

                  <div class="card-body">
                        <div class="card-header my-2 d-flex justify-content-between align-items-center">      
                                    <h5 class="fs-5 "  style="color:rgba(77, 212, 172, 1);">{{ __('profile.notifacations1') }}</h5>
                        </div>
                    <div class="mx-2 my-2 px-2" >
                       
                            <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                            
                            {{ __('profile.note1') }}
                              
                    </div>
                    <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note2') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note3') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note4') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note5') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note6') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note7') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note8') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note9') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note10') }}
                         
               </div>
               <div class="card-header my-2 d-flex justify-content-between align-items-center">      
                            <h5 class="fs-5 "  style="color:rgba(77, 212, 172, 1);">{{ __('profile.notifacations2') }}</h5>
                  </div>
                  <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note11') }}
                         
               </div>
               <div class="mx-2 my-2 px-2" >
                       
                       <input class="form-check-input mx-2" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                       
                       {{ __('profile.note12') }}
                         
               </div>
           
              </div>
              <hr>
                    <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="" href="#">Save</a>
                    </div>
                  </div>
            </section>


        </div>

    </main>


@endsection
