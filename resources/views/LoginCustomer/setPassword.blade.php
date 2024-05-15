<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/setpw.css') }}">
</head>
<body>
    <div class="cover">
        <div class="img">
            <img class="size-img" src="{{ asset('asset/logo.png') }}" alt="logo">
        </div>

        <div class="container">
            <div class="column">
                <div class="row">
                    <center>
                        <h1 class="font" style="color: white;font-family: Inknut-Bold">Reset Password</h1>
                    </center>
                </div>


                        <div class="row">
                        <p>Password :</p>
                        <input  type="password"  placeholder="Password">
                        </div>
                        <div class="row">
                            <p>Confirm Password :</p>
                            <input type="password"  placeholder="Confirm Password">
                        </div>
                        <center>

                            <div class="row">
                                <button onclick="window.location.href='/login'"> Login </button>
                            </div>
                        </center>
            </div>
        </div>

    </div>
</body>
</html>
