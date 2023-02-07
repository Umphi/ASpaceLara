<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Расписание АК СибГУ</title>
        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <!--<div class="preloader">
		    <img src="/images/sibsau.gif" width="150" height="150" alt="прелоад">
		</div>-->
        <div class="header">
            <div class="upperpanel">
                <div class="upperpanel_left">
                    @if(Request::is('/'))
                        <a href="{{route('editor')}}">Редактировать расписание</a>
                        <a href="{{route('changes')}}">Изменения</a>
                        <a>Пропуски</a>
                        <a>Практика</a>
                        <a>Рассылки</a>
                    @endif
                    <a href="{{route('schedule')}}">Просмотр расписания</a>
                    <a>Аудитории</a>
                    <a>Преподаватели</a>
                    @yield('header_upperpanel_menu')
                </div>
                <div class="upperpanel_right">
                    <a>Войти</a>
                </div>
            </div>
            <div class="logo-wrap">
                <div class="main_logo">
                    <svg id="svg16" viewBox="0 0 46.610785 50.680001" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g
                           data-name="Layer 1"
                           id="Layer_1">
                          <path
                             style="fill:#89be5c;fill-rule:evenodd"
                             id="path8"
                             d="m 26.37,46.63 v 2.05 h 4.06 v 2 H 24.34 V 46.63 A 21.2,21.2 0 0 1 11.8,41.78 l 1.44,-1.44 a 19.27,19.27 0 0 0 24.23,0 l 1.44,1.44 a 21.2,21.2 0 0 1 -12.54,4.84 z m 14,-9.15 A 19.27,19.27 0 0 0 27.37,6.2 v -2 a 21.3,21.3 0 0 1 14.4,34.72 L 40.33,37.48 Z M 23.37,6.2 A 19.18,19.18 0 0 0 13.28,10.38 L 11.8,8.93 A 21.2,21.2 0 0 1 23.33,4.15 v 2 z M 8.93,38.91 A 21.2,21.2 0 0 1 4.15,27.38 h 2 a 19.18,19.18 0 0 0 4.18,10.09 z M 4.15,23.33 A 21.2,21.2 0 0 1 8.93,11.8 l 1.44,1.44 A 19.18,19.18 0 0 0 6.19,23.33 Z"
                             class="cls-1" />
                          <path
                             style="fill:#4b79bb;fill-rule:evenodd"
                             id="path10"
                             d="M 37.52,36.09 44,42.56 42.56,44 36.08,37.52 A 16.23,16.23 0 0 1 15.4,38.17 l 1.45,-1.45 a 14.2,14.2 0 1 0 0,-22.74 L 15.4,12.54 A 16.14,16.14 0 0 1 24.34,9.16 V 0 h 2 q 0,4.58 0,9.16 a 16.23,16.23 0 0 1 11.18,26.93 z m -25,-0.78 A 16.14,16.14 0 0 1 9.24,27.39 h 2 A 14.13,14.13 0 0 0 14,33.86 l -1.46,1.44 z m -3.28,-12 a 16.14,16.14 0 0 1 3.28,-7.92 L 14,16.85 a 14.13,14.13 0 0 0 -2.68,6.48 z"
                             class="cls-2" />
                          <path
                             style="fill:#7f7e7c;fill-rule:evenodd"
                             id="path12"
                             d="M 25.35,14.2 A 11.16,11.16 0 1 1 18.21,33.93 L 8.14,44 6.71,42.56 16.78,32.49 A 11.11,11.11 0 0 1 14.24,26.37 H 0 v -2 h 14.24 a 11.11,11.11 0 0 1 2.54,-6.12 L 6.71,8.14 8.14,6.71 18.22,16.78 a 11.11,11.11 0 0 1 7.14,-2.58 z m 6.45,4.7 a 9.13,9.13 0 1 0 2.67,6.45 9.1,9.1 0 0 0 -2.66,-6.45 z"
                             class="cls-3" />
                        </g>
                    </svg>
                </div>
                <div class="logo-wrap-right">
                    <div class="strip"></div>
                    <h1>АК СибГУ</h1>
                    <nav class="menu">
                        @yield('header_bottompanel_menu')
                    </nav>
                </div>
            </div>
        </div>
        @if($errors->any())
            <div id="error-popup">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(() => document.getElementById('error-popup').remove(), 5000);
            </script>
        @elseif(session('success'))
            <div id="error-popup">
                <ul>
                    <li>{{session('success')}}</li>
                </ul>
            </div>
            <script>
                setTimeout(() => document.getElementById('error-popup').remove(), 5000);
            </script>
        @endif
        @yield('content')
    </body>
</html>