<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand" >
                <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px;">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <div class="body-content">
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171); color: white">
                <a href="dashboard" class="sidebar-custom"> Dashboard</a>
                <a href="books" class="sidebar-custom"> Books </a>
                <a href="category" class="sidebar-custom">Category</a>
                <a href="rent" class="active"> Rent Log </a>
                <a href="#" class="sidebar-custom" id="logout-link"> Log out </a>
            </div>
            <div class="content">
                <h2>Rent Log <button type="button" style="font-size: 20px;margin-left:75%" class="btn btn-success" onclick="window.location.href='{{ route('rentlog.downloadPDF') }}'">Download PDF</button>
                </h2>

                <div class="row mt-4">
                    <div class="col-lg-4">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-book">
                            <i class="bi bi-journal-bookmark me-3"></i>
                            <div class="info">
                                <span class="card-desc">Borrowed: </span><br>
                                <span class="card-count" style="font-size: 29px">{{ $borrowedCount }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-book">
                            <i class="bi bi-journal-bookmark me-3"></i>
                            <div class="info">
                                <span class="card-desc">Completed:</span><br>
                                <span class="card-count" style="font-size: 29px">{{ $completedCount }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3 d-flex flex-row align-items-center card-data-book">
                            <i class="bi bi-journal-bookmark me-3"></i>
                            <div class="info">
                                <span class="card-desc">Canceled:</span><br>
                                <span class="card-count" style="font-size: 29px">{{ $canceledCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table my-5">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Book Title</th>
                            <th>Borrower</th>
                            <th>Status</th>
                            <th>Borrow_date</th>
                            <th>Return_date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loans as $bookLoan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bookLoan->book->title }}</td>
                            <td>{{ $bookLoan->user->name }}</td>
                            <td>{{ $bookLoan->status }}</td>
                            <td>{{ $bookLoan->borrow_date }}</td>
                            <td>{{ $bookLoan->return_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
