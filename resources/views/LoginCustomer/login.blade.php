<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="cover">

        <div class="img">
            <img class="size-img" src="{{ asset('asset/logo.png') }}" alt="logo">
        </div>
        <div class="container">
            <div class="column">
                <center>
                    <div class="row">
                        <p class="font" style="font-family: Inknut-Bold">Login</p>
                    </div>
                </center>
                <center>
                    <div class="row">
                        <input type="email" placeholder="Gmail">
                    </div>
                </center>
                <center>
                    <div class="row">
                        <input type="password" placeholder="password">
                    </div>

                </center>
                <div class="row" style="text-align: right;margin-right: 20px;">
                    <a href="/forgotpasswordcustomer" style="text-decoration: none">
                        <span style="color: white">Forgot Your</span>
                        <span style="color: black">Password?</span>
                    </a>
                </div>
                <div class="row" style="text-align: center">

                    <button onclick="window.location.href='/'" >Continue</button>
                </div>
                <div class="row" style="height: 20px"></div>
            </div>
        </div>


    </div>
</body>
</html>
