<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
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
            <div class="sidebar d-lg-block" id="navbarTogglerDemo02">
                <a href="{{ route('home') }}"> Dashboard</a>
                <a href="{{ route('books') }}" class="active"> Books </a>
                <a href="{{ route('category') }}">Category</a>
                <a href="{{ route('rent') }}"> Rent Log </a>
                <a href="{{ route('login') }}"> Log out </a>
            </div>
            <div class="content">
                <h2>Add New Book</h2>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('books') }}" class="btn btn-secondary me-5">Back</a>
                </div>

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

                    <!-- resources/views/books/create.blade.php -->
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="book_code" class="form-label">Book Code</label>
                            <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Enter Book Code" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image_book" class="form-label">Book Image</label>
                            <input type="file" name="image_book" id="image_book" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" id="status" class="form-control" placeholder="Enter Status" value="default_value">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="categories[]" id="category" class="form-control" multiple>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
