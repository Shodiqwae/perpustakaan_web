<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #ffffff;
        }

        .container {
           width: 1000px; /* Mengatur lebar absolut */
           max-width: 1050px;
           height: 500px; /* Menambahkan tinggi untuk memastikan kontainer melebar ke atas */
           display: flex;
           align-items: center; /* Menengahkan kontainer secara vertikal */
           background: url('Images/bc.jpeg') center center no-repeat; /* Menggunakan path gambar yang benar */
           background-size: cover;
           border-radius: 15px;
           box-shadow: 0 10px 15px rgba(0, 0, 0, 0.5);
        }

        .login {
            width: 400px;
        }

        form {
            width: 250px;
            margin: 60px auto;
            text-align: center; /* Menengahkan elemen form secara horizontal */
        }

        h1 {
            margin: 0 0 20px 0;
            font-weight: bolder;
            text-transform: uppercase;
        }

        hr {
            margin: 0 20px 20px 20px;
            border-top: 2px solid #000000;
        }

        p {
            margin: 10px 0;
        }

        form label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            text-align: left; /* Memposisikan label ke kiri */
        }

        input {
            width: calc(100% - 20px); /* Lebar input dikurangi padding */
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .button {
            display: inline-block;
            padding: 10px 100px;
            border: none;
            border-radius: 10px;
            background: #da1f1f;
            color: #ffffff;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #b51717; /* Warna yang berbeda saat tombol disorot */
        }

        .button:focus {
            outline: none; /* Menghapus garis putus-putus yang muncul saat tombol di-focus */
        }

        .button-wrapper {
            display: flex;
            justify-content: center; /* Menengahkan tombol secara horizontal */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="">
                <h1>Login</h1>
                <hr>
                <p>Petuga Perpustakaan</p>
                <label for="">Username</label>
                <input type="text" placeholder="syifashadiq">
                <label for="">Password</label>
                <input type="password" placeholder="password">
                <div class="button-wrapper">
                    <a href="{{ route('home') }}" class="button">Login</a>
                </div>
            </form>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>
