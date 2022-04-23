@foreach ($data as $d)
 <form action="{{ route('account_save') }}" method="POST" class="login-form" enctype="multipart/form-data">

         @csrf
         <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="name"
                 value="{{ $d->name }}">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
         <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="file" class="form-control rounded-left" placeholder="Enter Your Name" name="avatar"
                 value="{{ $d->avater }}">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
         <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="gender"
                 value="{{ $d->gender }}">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
         <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="country"
                 value="{{ $d->country }}">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
 <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="mobile"
                 value="{{ $d->mobile}}">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
         <button type="submit" class="wak_btn d-grid w-100">{{ __('login.register') }}
         </button>
         {{ csrf_field() }}


     @endforeach
 </form>
