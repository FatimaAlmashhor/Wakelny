@foreach ($data as $d)
<img src="{{ $d->avatar }}"
                            class="user-avatar img-fluid rounded-circle"
                            alt="user avatar"style="width: 70%;"/>
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
                 value="{{ $d->avater }}" required="required">
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
         </div>
         <div class="form-group mb-2">
             {{-- <label for="username" class="form-label">{{ __('login.name') }}</label>
             <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="gender"
                 value="{{ $d->gender }}"> --}}
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                    <select class="form-control" name="gender" required="required">
    <option @if( $d->gender==1) selected @endif value="1">male</option>
                    <option  @if( $d->gender==-1) selected @endif value="-1">female</option>

</select>
         </div>
         <div class="form-group mb-2">
             <label for="username" class="form-label">{{ __('login.name') }}</label>
             {{-- <input type="text" class="form-control rounded-left" placeholder="Enter Your Name" name="country"
                 value="{{ $d->country }}"> --}}
             {{-- @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                     <select class="form-control" name="country" required="required">
    <option @if( $d->country=="yem") selected @endif value="yem">yemen</option>
     <option  @if( $d->country=="ksa") selected @endif value="ksa">ksa</option>
<option @if( $d->country=="egy") selected @endif value="egy">egypt</option>
     <option  @if( $d->country=="UAE") selected @endif value="UAE">UAE</option>

</select>
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
