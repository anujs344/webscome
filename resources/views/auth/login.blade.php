@extends('servicewebscome.layouts.master')

@section('content')
<!--Login  --->
<section> 
    <div class="container mb-5 pt-4">
      <div class="row justify-content-center">
        <div class="col-md-4 box-adi box-adi-shaddow pb-3 box-webscome">
          
          <div class="col-md-12 pt-1 justify-content-center p-2">
            <h2 class="text-center p-adi">Login</h2>
            <hr>
          </div>
          <div class="col-md-12 pt-1">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            
                <label for="email" value="{{ __('Email') }}" />
                <input id="email" class="form-control mb-2"  type="email" placeholder="Enter Email" name="email" :value="old('email')" onfocus="true" maxlength="" required autofocus />
            

            
                <label for="password" value="{{ __('Password') }}" />
                <input id="password" class="form-control  mb-4" type="password" name="password" placeholder="Enter Password" name="" maxlength="" required autocomplete="current-password" />
            

           


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" name="" class="btn btn-info btn-block">{{ __('Log in') }}</button>
                <br>
              <br>
              
            
              <a href="" class="text-danger"><p>Forgot your password?</p></a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}"><p>Didn't have an account? <big class="text-success">Create an account.</big></p></a>
              @endif
            </div>
        </form>
    </div>
</div>
</div>
</div>
</section>
@endsection
