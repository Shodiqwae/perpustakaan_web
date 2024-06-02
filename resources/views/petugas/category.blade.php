<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
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
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171); color: white">
                <a href="dashboard"  class="sidebar-custom"> Dashboard</a>
                <a href="books" class="sidebar-custom"> Books </a>
                <a href="category" class="active" >Category</a>
                <a href="rent" class="sidebar-custom"> Rent Log </a>
                <a href="#" class="sidebar-custom" id="logout-link"> Log out </a>
            </div>
            <div class="content">
              <h2>Category List</h2>

              <div class="mt-5 d-flex justify-content-end">
                <a href="category-deleted" class="btn btn-secondary me-5">View Deleted Data</a>
                <a href="category-add" class="btn btn-primary">Add Data</a>
              </div>

              <div class="mt-5">
                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif
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
                        @foreach($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-link-e" href="{{ route('petugas.category-edit', $category->slug) }}">
                                    Edit
                                </a>
                                <form action="{{ route('petugas.category-delete', $category->slug) }}" method="POST" style="display: inline;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
