<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link href="{{ secure_asset('css/welcome.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            <img src="https://www.pakutaso.com/shared/img/thumb/006horror0523_TP_V.jpg" width="1400" height="900" alt="女の霊">
                <div class="title m-b-md">
                    オカルトクラブ
                </div>

                @if (Route::has('login'))
                    <div class="links">
                        <ul>
                        @auth
                            <li class="okura"><a href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li class="negitama"><a href="{{ route('login') }}">Login</a></li>
    
                            @if (Route::has('register'))
                                <li class="ti-gyu"><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </body>
    <footer>
        <p class="copyright">(C) 2021 心霊現象研究委員会　代表　ガリボネ.</p>
    </footer>
</html>
