
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <style>
        /* Tambahkan aturan CSS di sini */
        .btn-link {
            background-color: brown;
            color: #fbffff; /* Ubah ini ke warna yang diinginkan */
            text-decoration: none; /* Menghilangkan garis bawah */
        }

        .btn-link:hover {
            background-color: darkseagreen;
            color: #0056b3; /* Warna saat tombol di-hover */
            text-decoration: none; /* Menghilangkan garis bawah saat di-hover */
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px;">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <div class="body-content">
            <div class="sidebar d-lg-block" id="navbarTogglerDemo02"  style="background-color: rgb(41, 41, 171); color: white">
                <a href="home" class="sidebar-custom"> Dashboard</a>
                    <a href="books" class="sidebar-custom"> Books </a>
                    <a href="category" class="active" class="sidebar-custom">Category</a>
                    <a href="rent" class="sidebar-custom"> Rent Log </a>
                    <a href="login" class="sidebar-custom"> Log out  </a>
            </div>
            <div class="content">
              <h2>Deleted Category List</h2>

              <div class="d-flex justify-content-end mt-3">
                <a href="category" class="btn btn-secondary me-5">Back</a>
              </div>

              <div class="my-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deletedCategories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <!-- Add restore button -->
                                    <form action="{{ route('petugas.category-restore', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link">Restore</button>
                                    </form>
                                </td>
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
