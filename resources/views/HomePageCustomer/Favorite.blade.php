<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Favorite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/favorite.css') }}">
    <style>
         .scroll::-webkit-scrollbar {
    background-color: rgba(226, 225, 247, 0);
}
        .nav-pills .animated-button {
            background-color: blue; /* Warna latar belakang awal */
            color: white; /* Warna teks awal */
        }

        /* Gaya untuk tautan navigasi yang aktif */
        .nav-pills .animated-button.active-button {
            box-shadow: 0 0 0 5px #010a8a;
            color: #ffffff;
            background-color: blue; /* Warna latar belakang saat tautan aktif */
        }
    /* Gaya untuk tautan navigasi yang aktif */
    .nav-pills .animated-button.active-button {
        box-shadow: 0 0 0 5px #010a8a;
        color: #ffffff;
        background-color: blue; /* Warna latar belakang saat tautan aktif */
    }

    .flora {
        margin-right: 50px;
    }

    .text-light-1 {
        color: #000000;
        font-weight: bold;
    }
    .custom-button{
        text-align: center;
        justify-content: center;
        align-items: center;
        font-weight: 400;
        color: white;
        height: 33px;
        width: 90px;
        border-radius: 10px;
        font-size: 17px;
        background-color: #5f67df;
        margin-bottom: 10px;

    }
    </style>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- Ensure the file path is correct -->
                    <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
        <div class="body-content">
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171);">
                <a href="dashboard"  class="sidebar-custom" style="color: white"> Discover </a>
                <a href="YourLibrary" class="sidebar-custom"  style="color: white"> My Library </a>
                <a href="Favorite"  class="activeC" style="color: white">Favorite</a>
                <a href="#" class="sidebar-custom" id="logout-link" style="color: white"> Log out </a>
            </div>
            <div class="content">
                <div  class="content bg-white scrollable-content nav-pills justify-content-left" style="border-radius: 20px; font-family: Inknut-Bold; height: 100vh">
                    <div class="row">
                        <h2>Favorite</h2>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5">
                        @foreach($favoriteBooks as $book)
                        <div class="col mb-3">
                            <div class="card shadow">
                                <img src="{{ asset('storage/' . $book->image_book) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 30vh; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title custom-text">{{ $book->title }}</h5>
                                    <p class="card-text" style="color: rgb(110, 110, 110);" >{{ $book->categories->pluck('name')->join(', ') }}</p>
                                    <form id="delete-form-{{$book->id}}" action="{{ route('favorite.delete', ['id' => $book->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button" style="background-color: #00000000; border: none;">
                                            <img src="{{ asset('images/heart (1).png') }}" class="favorite-custom" alt="Delete">
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#delete-button').click(function(event){
                event.preventDefault(); // Menghentikan perilaku default dari tombol submit

                // Tampilkan pesan alert
                alert("Apakah Anda yakin ingin menghapus item ini?");

                // Jika ingin melakukan penghapusan setelah alert ditampilkan, tambahkan kode penghapusan di sini
            });
        });
    </script>
    </script>

    <script>
        // Function to handle logout
        function handleLogout(event) {
            event.preventDefault(); // Prevent default action (following the link)

            // Create a form element
            var form = document.createElement('form');
            form.method = 'POST'; // Set method to POST
            form.action = '{{ route("logout") }}'; // Set form action to logout route

            // Add CSRF token input field
            var csrfTokenField = document.createElement('input');
            csrfTokenField.setAttribute('type', 'hidden');
            csrfTokenField.setAttribute('name', '_token');
            csrfTokenField.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfTokenField);

            // Append form to document body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
        }

        // Add event listener to the logout link
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logout-link').addEventListener('click', handleLogout);
        });
    </script>

</body>
</html>
