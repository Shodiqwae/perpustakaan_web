<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
.notification {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #334597a3;
            color: white
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
            width: 100%; /* Lebar input 100% dari elemen pembungkusnya */
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .button {
            display: block;
            width: 100%; /* Pastikan tombol memiliki lebar 100% dari elemen pembungkusnya */
            padding: 10px 0; /* Atur padding vertikal */
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
            width: 100%; /* Lebar elemen pembungkus 100% */
            margin-top: 10px; /* Menambahkan margin top */
        }

        .forgot-password {
            margin-top: -5px; /* Mengatur margin top */
            margin-bottom: 15px; /* Mengatur margin bottom */
            text-align: right; /* Mengatur teks ke kanan */
        }

        .forgot-password a {
            color: #000000;
            text-decoration: none;
            font-size: 15px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login">
            <form id="registration-form" action="{{ route('register.admin.post') }}" method="POST">
                @csrf
                <h1>Register</h1>
                <hr>
                @if ($errors->any())
                <div class="notification">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

                <label for="email">Email</label>
                <input type="name" id="email" name="email" placeholder="Email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="name">Username</label>
                <input type="name" id="name" name="name" placeholder="Username" required>
                <div class="forgot-password">
                    <a href="loginA" style="color: white">Login Admin?</a>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="button">Register as Admin</button>
                </div>
            </form>
        </div>
        <div class="right"></div>
    </div>

    <script>
        // Fungsi untuk memeriksa apakah password dan konfirmasi password cocok
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            // Jika password dan konfirmasi password tidak cocok, tampilkan pesan kesalahan
            if (password != confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }
            return true;
        }

        // Menambahkan event listener untuk form submit
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            if (!validatePassword()) {
                event.preventDefault(); // Mencegah pengiriman formulir jika password tidak cocok
            }
        });
    </script>
</body>
</html>
