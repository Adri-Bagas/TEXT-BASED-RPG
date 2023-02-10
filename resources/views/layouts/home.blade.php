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
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>

    @yield('content')
</body>

@yield('js')

</html>