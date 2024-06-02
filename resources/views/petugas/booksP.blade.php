<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>

<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content">
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171); color: white">
                <a href="dashboard" class="sidebar-custom"> Dashboard</a>
                <a href="books" class="active" class="sidebar-custom"> Books </a>
                <a href="category" class="sidebar-custom">Category</a>
                <a href="rent" class="sidebar-custom"> Rent Log </a>
                <a href="#" class="sidebar-custom" id="logout-link"> Log out </a>
            </div>
            <div class="content">
                <h2>Book List</h2>

                <div class="mt-5 d-flex justify-content-end">
                    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Data</a>
                </div>

                <div class="my-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image Book</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($item->image_book)
                                            <img src="{{ asset('storage/' . $item->image_book) }}" alt="Book Image"
                                                style="width: 200px; height: auto;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $item->book_code }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>
                                        <a href="{{ route('books-edit', ['id' => $item->id]) }}" class="btn btn-link-e">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('books.destroy', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link-d">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
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
