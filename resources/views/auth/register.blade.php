<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <style>
        @font-face {
            font-family: Alagard;
            src: url({{ asset('font/Alagard.ttf') }});
        }

        @font-face {
            font-family: Bleo;
            src: url({{ asset('font/Bleo.ttf') }});
        }

        @font-face {
            font-family: KiwiSoda;
            src: url({{ asset('font/KiwiSoda.ttf') }});
        }

        @font-face {
            font-family: PerfectDos;
            src: url({{ asset('font/PerfectDosWin.ttf') }});
        }

        @font-face {
            font-family: Alkhemikal;
            src: url({{ asset('font/Alkhemikal.ttf') }});
        }

        @font-face {
            font-family: VeniceClassic;
            src: url({{ asset('font/VeniceClassic.ttf') }});
        }
        </style>
    <link rel="stylesheet" href="{{ asset('style/home.css') }}">
    <title>Start Adventure.</title>
</head>
<body>
    <img class='background' src="{{ asset('img/gif/backgroundHome.gif') }}" alt="">

    <main>
        <div class="screen">
            <h1 class="hero-text">Start Your Adventure.</h1>
            <button class="btn1">Start !</button>

            <div class='signIn'>

            <h1 class="signText">Sign Up</h1>
                <form action="{{ route('register') }}" method="POST" id='signInForm'>
                    @csrf 

                    <div class="formControl">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="formControl">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="formControl">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="formControl">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="formControl2">
                        <input type="checkbox" name="agreed" id="agreed">
                        <label for="agreed">By Checking This You are agree to Our Terms And Condition in mind</label>
                    </div>

                    <button type="submit" class="btn2">Sign Up</button>
                </form>

                <p><a class="login">Already have an account?</a></p>
            </div>
        </div>
    </main>
    <div class="preloader">

    </div>
</body>

<script src="{{ asset('/js/home.js') }}"></script>

</html>