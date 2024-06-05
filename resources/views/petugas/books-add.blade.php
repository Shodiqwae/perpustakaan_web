<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="sidebar d-lg-block" id="navbarTogglerDemo02"  style="background-color: rgb(41, 41, 171); color: white">
                <a href="{{ route('home') }}" class="sidebar-custom"> Dashboard</a>
                <a href="{{ route('books') }}" class="active"> Books </a>
                <a href="{{ route('petugas.category') }}" class="sidebar-custom">Category</a>
                <a href="{{ route('rent.page') }}" class="sidebar-custom"> Rent Log </a>
                <a href="{{ route('login') }}" class="sidebar-custom"> Log out </a>
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
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock Quantity" required min="0">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
