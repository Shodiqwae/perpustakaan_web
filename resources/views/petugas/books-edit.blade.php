<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <a href="{{ route('petugas.homeP') }}" class="sidebar-custom"> Dashboard</a>
                <a href="{{ route('books') }}" class="active"> Books </a>
                <a href="{{ route('petugas.category') }}" class="sidebar-custom">Category</a>
                <a href="{{ route('rent.page') }}" class="sidebar-custom"> Rent Log </a>
                <a href="{{ route('login') }}" class="sidebar-custom"> Log out </a>
            </div>
            <div class="content">
                <h2>Edit Book</h2>

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
                    <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="book_code" class="form-label">Book Code</label>
                                    <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Enter Book Code" required value="{{ old('book_code', $book->book_code) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="categories[]" id="category" class="form-control select-multiple" multiple required>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if(in_array($category->id, $book->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="form-group mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Book Title" required value="{{ old('title', $book->title) }}">
                          </div>
                          <div class="form-group mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control" placeholder="Enter Author Name" required value="{{ old('author', $book->author) }}">
                          </div>
                          <div class="form-group mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="Enter Stock Quantity" value="{{ $book->stock }}" required>
                        </div>

                          <div class="form-group mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" name="image_book" class="form-control">
                            @if ($book->image_book)
                            <img src="{{ asset('storage/'.$book->image_book) }}" alt="{{ $book->title }}" style="height: 100px;">
                            @endif
                          </div>
                          <div class="form-group mb-3">
                            <label for="title" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Deskripsi" required value="{{ old('description', $book->description) }}">
                          </div>


                          <div class="mt-3">
                            <button class="btn btn-success" type="submit">Save</button>
                          </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
</body>
</html>
