<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <style>
    .header{ text-align:right; font-size:10pt; margin:10px;
        border-bottom:solid 1px #ccc; color:#ccc; }
    .footer{ padding-top:15px; padding-right:5px; text-align:right; font-size:10pt; margin:10px; color:#ccc; }
    textarea {resize: none;width:1000px;height:75px;}
    body {padding-bottom:10px;background-color:#eecd73}
    a {color: black;}
    .container {padding-top:20px}
    .follow {background-color:#f0f8ff; padding:10px; border:solid 1px #ccc;}
    .profile {background-color:#f0f8ff;padding:8px;border:solid 1px #ccc;width:730px;margin-right:auto; margin-left:auto}
    .profile_1 {padding-top:10px;width:730px;margin-right:auto; margin-left:auto}
    .arial_black{font-family:'arial black';padding:8px; font-size:20pt;}
    .arial_black_1{font-family:'arial black';padding:8px}
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class = "header">
        <div class="pos-f-t">
            <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <div data-turbolinks="false">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div data-turbolinks="false">
                                <a class="nav-link" href="{{ route('follow_all')}}">アカウント一覧</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div data-turbolinks="false">
                                <a class="nav-link" href="{{ route('myprofile', ['user_id' => Auth::id()]) }}">マイページ</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class = "content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
    <script>
    document.querySelector('.navbar-toggler').onclick = function() {
        if(document.getElementById('navbar').classList.contains('show')) {
            document.querySelector('#navbar').classList.remove('show');
        } else {
            document.querySelector('#navbar').classList.add('show');
        }
    }
    </script>
</body>
</html>
