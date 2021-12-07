<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 style="font-size: 27px;font-weight:bold;color:#edab33;margin-left: 17%">Login</h1>
            <svg style="color: #59743a" xmlns="http://www.w3.org/2000/svg" class="h-15 w-20 m-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        {{-- @if (('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
            </div>
        @endif --}}

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        {{-- @if(Auth::user()->verified_user == '1')
            <div class="w3-panel w3-red">
                <p>I am a panel.</p>
            </div>
        @endif --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <br>
            <div>
                <div class="g-recaptcha" data-callback="onCallBack" data-sitekey="6Lfg84IdAAAAAEWvgkAstA8U7MW9DxgdNELc6vtg"></div>
            </div>

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

                <x-jet-button disabled>
                    {{ __('Log in') }}
                </x-jet-button>
                {{-- <button>Login</button> --}}
                {{-- <button style="background-color: #f3bf60" class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400" type="submit" onclick="checkRecaptcha()" disabled>
                    <i class="material-icons">Log in</i>
                </button> --}}
                {{-- <input type="submit" onclick="checkRecaptcha();" value="submit"> --}}
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<div class="footer" style="background-color: #5a5a5c;">
    <p style="color:#ede0e0"><b style="color: #85c240;">About ODU:</b> Old Dominion University, located in Norfolk, is Virginia's forward-focused public doctoral research university with more than 24,000 students, rigorous academics, an energetic residential community and initiatives that contribute $2.6 billion 
        annually to Virginia's economy.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <b style="color: #85c240;text-decoration: underline" title="Click to know about project"><a href="{{ url('/projectinfo') }}">About Project</a></b><b style="color: #85c240;">&nbsp;&nbsp;&nbsp;Contact me: </b>gopal.hello12@gmail.com </p>
</div>

{{-- <script>
    if (grecaptcha.getResponse() == ""){
        alert("You can't proceed!");
    } else {
        alert("Thank you");
    }
</script> --}}
<script>
    // var onloadCallback = function() {
    //   grecaptcha.render('html_element', {
    //     'sitekey' : '6LdfQ2kdAAAAANx910hQZQNs6zJ0MiKOvi1GGqaF'
    //   });
    // };
    console.log($('button').attr('disabled', 'disabled'));
    $('button').attr('disabled', 'disabled');

    function onCallBack(){
        var response = grecaptcha.getResponse();
        if(response) {
            console.log("Inside the If condition")
            $('button').removeAttr('disabled');
        } else {
            $('button').attr('disabled', 'disabled');
        }
    }

</script>