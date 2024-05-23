<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg">
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
            <div class="sidebar d-lg-block" id="navbarTogglerDemo02">
                <a href="{{ route('home') }}"> Dashboard</a>
                <a href="{{ route('books') }}"> Books </a>
                <a href="{{ route('category') }}" class="active">Category</a>
                <a href="{{ route('rent') }}"> Rent Log </a>
                <a href="{{ route('login') }}"> Log out </a>
            </div>
            <div class="content">
              <h2>Edit Category</h2>
              <div class="mt-5 w-50">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('category-update', ['slug' => $category->slug]) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Tambahkan metode PUT -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Enter category name">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
