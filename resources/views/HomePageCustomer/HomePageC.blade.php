<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homeC.css') }}">

    <style>
    .nav-pills .animated-button {
        background-color: blue; /* Warna latar belakang awal */
        color: white; /* Warna teks awal */
    }

    /* Gaya untuk tautan navigasi yang aktif */
    .nav-pills .animated-button.active-button {
        box-shadow: 0 0 0 5px #010a8a;
        color: #ffffff;
        background-color: blue; /* Warna latar belakang saat tautan aktif */
    }
    </style>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/2.png') }}" alt="Logo" style="height: 40px; width: auto;">
                </a>
                <button style="background-color: #5f67df" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span  class="navbar-toggler-icon"></span>
                </button>
             {{-- search --}}
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="d-flex" role="search">
                        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">                    </form>
                </div>
            </div>
        </nav>
        <div class="body-content">
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171);">
                <a href="dashboard" class="activeC" style="color: white"> Discover </a>
                <a href="YourLibrary" class="sidebar-custom" style="color: white"> My Library </a>
                <a href="Favorite" class="sidebar-custom" style="color: white">Favorite</a>
                <a href="#" class="sidebar-custom" id="logout-link" style="color: white"> Log out </a>
            </div>
            <div class="content">
                <div class="content bg-white scrollable-content nav-pills justify-content-left" style="border-radius: 20px; font-family: Inknut-Bold; height: 100vh">
                    <div class="row">
                        <h2>Category</h2>
                    </div>
                    <ul class="list-inline" style="margin-top: 20px">
                        <li class="list-inline-item">
                            <button href="#All" class="animated-button active-button" data-category="All">
                                <span>All</span>
                                <span></span>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button href="#Novel" class="animated-button" data-category="Novel">
                                <span>Novel</span>
                                <span></span>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button href="#Comic" class="animated-button" data-category="Comic">
                                <span>Comic</span>
                                <span></span>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button href="#History" class="animated-button" data-category="History">
                                <span>History</span>
                                <span></span>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button href="#Knowledge" class="animated-button" data-category="Knowledge">
                                <span>Knowledge</span>
                                <span></span>
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="All" class="tab-pane fade show active" style="background: white">
                            <div class="row" style="margin-top: 30px">
                                <div class="container" id="recommended-section">
                                    <div class="row">
                                        <h2>Recommended</h2>
                                        <!-- Card Template for Recommended Books -->
                                        <div class="col-md-3 custom-col" style="margin-top: 20px">
                                            <div class="card shadow">
                                                <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title custom-text">The Hike To Home</h5>
                                                    <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                    <div class="row">
                                                        <div class="d-flex">
                                                            <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                            <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                            <button class="btn btn-secondary" style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add more cards as needed -->
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="book-section">
                                <h2 style="margin-top: 30px" data-category="All">nama categories</h2>
                                @foreach ($books as $item)
                                <div class="col-md-3 custom-col book-card" data-category="{{ $item->categories->pluck('name')->join(', ') }}" style="margin-top: 20px">
                                    <div class="card shadow">
                                        <img src="{{ asset('storage/' . $item->image_book) }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title custom-text">{{ $item->title }}</h5>
                                            <p class="card-text" style="color: rgb(110, 110, 110);">{{ $item->categories->pluck('name')->join(', ') }}</p>
                                            <div class="row">
                                                <div class="d-flex">
                                                    <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                    <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                    <button class="btn btn-secondary" style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Add more tab panes for other categories if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
  $(document).ready(function(){
    // Initialize the first tab and button as active
    $('#All').addClass('show active');
    $('.animated-button[href="#All"]').addClass('active-button');
    updateCategoryTitle("All"); // Set initial category title

    // Handle button clicks to switch tabs and filter books
    $('.animated-button').click(function(event){
        event.preventDefault(); // Prevent default action of button

        $('.animated-button').removeClass('active-button');
        $(this).addClass('active-button');

        var targetCategory = $(this).data('category');
        filterBooks(targetCategory);
        updateCategoryTitle(targetCategory); // Update category title

        // Show/hide recommended section based on the selected category
        if (targetCategory === 'All') {
            $('#recommended-section').show();
        } else {
            $('#recommended-section').hide();
        }
    });

    function filterBooks(category) {
        $('.book-card').each(function() {
            var bookCategories = $(this).data('category').split(', ');
            if (category === 'All' || bookCategories.includes(category)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    function updateCategoryTitle(category) {
        // Update the category title with the selected category
        if (category === 'All') {
            $('h2[data-category]').text("All Categories");
        } else {
            $('h2[data-category]').text(category);
        }
    }
});
    </script>
    <script>
        $(document).ready(function(){
            // Function to handle search input
            $('#searchInput').on('input', function(){
                var searchText = $(this).val().toLowerCase(); // Get input value and convert to lowercase

                // Filter book cards based on search text
                $('.book-card').each(function(){
                    var bookTitle = $(this).find('.card-title').text().toLowerCase(); // Get book title and convert to lowercase
                    if(bookTitle.includes(searchText)){ // Check if book title contains search text
                        $(this).show(); // Show book card if it matches the search text
                    } else {
                        $(this).hide(); // Hide book card if it doesn't match the search text
                    }
                });
            });
        });
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
