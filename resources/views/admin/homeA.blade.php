<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="d-flex me-auto" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
        <div class="body-content">
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171);">
                <a href="dashboard" class="active"> Dashboard</a>
                <a href="petugasA"  class="sidebar-custom">Petugas</a>
                <a href="userA"  class="sidebar-custom">User</a>
                <a href="Crudadmin" class="sidebar-custom">Admin</a>
                <a href="#" class="sidebar-custom" id="logout-link"> Log out </a>
            </div>
            <div class="content">
                <h2>Report Books</h2>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-book">
                            <i class="bi bi-journal-bookmark me-3"></i>
                            <div class="info">
                                <span class="card-desc">Books: </span><br>
                                <span class="card-count">{{ $BooksCount }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-category">
                            <i class="bi bi-list-stars"></i>
                            <div class="info">
                                <span class="card-desc">Total Stock: </span><br>
                                <span class="card-count">{{ $totalStock }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table my-5">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $index => $book)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->stock }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        function handleLogout(event) {
            event.preventDefault();

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("logout") }}';

            var csrfTokenField = document.createElement('input');
            csrfTokenField.setAttribute('type', 'hidden');
            csrfTokenField.setAttribute('name', '_token');
            csrfTokenField.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfTokenField);

            document.body.appendChild(form);
            form.submit();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logout-link').addEventListener('click', handleLogout);
        });
    </script>
</body>
</html>
