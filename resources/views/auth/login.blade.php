<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Econet | Econet Group | Econet Wireless |Inspired To Change Your World</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="{{asset('mobile/assets/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/assets/css/responsive.css')}}">
</head>

<body>

    <!-- page-title stary -->

    <div class="ba-page-name text-center mg-bottom-40">
        <h3>
            {{-- <img style="max-width:150px;" src="{{url('/')}}/uploads/aamt-logo-dt-data.png" alt="logo"> --}}
            <div class=" c-logo">
                <a class="logo__link" href="/ke-en" title="German Embassy Nairobi">
                   <picture class="c-picture--logo" data-css="c-picture">
                      <source srcset="https://nairobi.diplo.de/blob/772/47f731c5aa09d415e52ad2d35c55a7be/aamt-logo-sp-data.svg" media="(max-width:707px)" data-logotext=""/>
                      <source srcset="https://nairobi.diplo.de/blob/774/043b311bf7ef66e7fe96e3da3f0c8bb4/aamt-logo-tb-data.svg" media="(min-width:708px) and (max-width:1039px)" data-logotext=""/>
                      <source srcset="https://nairobi.diplo.de/blob/200/b26f8a6a21790f0822b0b21a2a92ac4b/aamt-logo-dt-data.svg" media="(min-width:1040px)" data-logotext=""/>
                      <img class="picture__image "
                         src="https://nairobi.diplo.de/blob/772/47f731c5aa09d415e52ad2d35c55a7be/aamt-logo-sp-data.svg" alt="logo" data-logotext="logo"
                         data-sizes="auto"/>
                   </picture>
                   <span class="logo__title">German Embassy</span>
                   <span class="logo__title">Nairobi</span>
                </a>
            </div>
        </h3>
    </div>
    <!-- page-title end -->

    <!-- singin-area start -->
    <div class="signin-area">
        <div class="container">

            <form class="contact-form-inner" method="POST" action="{{ route('login') }}">
                @csrf

                <label class="single-input-wrap">
                    <span>User name or email address*</span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </label>
                <label class="single-input-wrap">
                    <span>Password*</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <div class="single-checkbox-wrap">
                    <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox"><span>{{ __('Remember Me') }}</span>
                </div>

                <button type="submit" class="btn btn-purple">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="forgot-btn" href="{{ route('password.request') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
    <!-- singin-area End -->




    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- All Js File here -->
    <script src="{{asset('mobile/assets/js/vendor.js')}}"></script>
    <script src="{{asset('mobile/assets/js/main.js')}}"></script>

</body>



</html>
