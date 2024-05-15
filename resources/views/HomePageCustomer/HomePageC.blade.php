<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset("css/homeC.css") }}">
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
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02">
                <a href="home" class="active"> Dashboard</a>
                <a href="books"> Books </a>
                <a href="category">Category</a>
                <a href="rent"> Rent Log </a>
                <a href="login"> Log out </a>
            </div>
            <div class="content">
                <h2>Welcome, StarBook</h2>
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-book">
                            <i class="bi bi-journal-bookmark me-3"></i>
                            <div class="info">
                                <span class="card-desc">Books</span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-category">
                            <i class="bi bi-list-stars"></i>
                            <div class="info">
                                <span class="card-desc">Category</span><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h2> hello </h2>

<table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Book Title</th>
                                <th>Rent Date</th>
                                <th>Return Date</th>
                                <th>Actual Return Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td>No Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>