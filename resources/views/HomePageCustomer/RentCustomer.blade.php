<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Mylibrary.css') }}">
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
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171);">
                <a href="dashboard" class="sidebar-custom" style="color: white"> Discover </a>
                <a href="YourLibrary" class="sidebar-custom"  style="color: white"> My Library </a>
                <a href="Favorite" class="sidebar-custom" style="color: white">Favorite</a>
                <a href="rent" class="activeC" style="color: white">Rent</a>
                <a href="#" class="sidebar-custom" id="logout-link" style="color: white"> Log out </a>
            </div>
            <div class="content">
                <h2>Rent Log</h2>
                <table class="table my-5">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Book Title</th>
                            <th>Borrower</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookLoans as $bookLoan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bookLoan->book->title }}</td>
                            <td>{{ $bookLoan->user->name }}</td>
                            <td>{{ $bookLoan->status }}</td>
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
