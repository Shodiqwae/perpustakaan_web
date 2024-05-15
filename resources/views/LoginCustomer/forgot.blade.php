<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
</head>
<body>
    <div class="cover">

        <div class="img">
            <img class="size-img" src="{{ asset('asset/logo.png') }}" alt="logo">
        </div>

        <div class="container">
            <div class="column">
                <div class="row">
                    <p class="font" style="font-family: Inknut-Bold">Lupa Password? Jangan Khawatir</p>
                </div>
                <div class="row">
                    <p style="color: rgb(255, 255, 255); font-size: 17px;">Masukkan kode verifikasi yang telah dikirimkan ke email Anda untuk melanjutkan proses verifikasi dan mengakses akun Anda.</p>
                </div>
                <div class="row">
                    <input type="number"  placeholder="Kode Email">
                </div>
                <center>

                    <div class="row">
                        <button onclick="window.location.href='/SetPasswordcustomer'" >Continue</button>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
