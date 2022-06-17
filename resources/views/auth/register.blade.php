@extends('servicewebscome.layouts.master')
    
@section('content')
<!--- signup   ---> 
<section> 
    <div class="container mb-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-md-4 box-adi box-adi-shaddow pb-3 box-webscome">
          <div class="col-md-12 pt-1 justify-content-center p-2">
            <h4 class="text-center p-adi">Sign Up</h4>
            <hr>
          </div>
          <div class="col-md-12 pt-1">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="form-control mb-2" placeholder="Enter Name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="form-control mb-2" placeholder="Enter Email" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="form-control  mb-2" placeholder="Enter Password" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="form-control  mb-4" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
              
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif


              <button type="submit" name="" class="btn btn-info btn-block float-right ">Create Account</button>

              <br>
              <br>
              <br>
              <br>
              <a href="login.html"><p>Already have an account? <big class="text-success"> Login. </big></p></a>
              

            </form>
          </div>
        </div>
    </div>
  </section>

  @endsection
