<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('path_to_your_css_folder/sweetalert2.min.css') }}">
    <script src="{{ asset('path_to_your_js_folder/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <link rel="stylesheet" href="{{ asset('css/homeC.css') }}">

    <style>
           .checked {
        color: orange;
    }
       .scroll::-webkit-scrollbar {
    background-color: rgba(226, 225, 247, 0);
}
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
    /* Gaya untuk tautan navigasi yang aktif */
    .nav-pills .animated-button.active-button {
        box-shadow: 0 0 0 5px #010a8a;
        color: #ffffff;
        background-color: blue; /* Warna latar belakang saat tautan aktif */
    }

    .flora {
        margin-right: 50px;
    }

    .text-light-1 {
        color: #000000;
        font-weight: bold;
    }
    .custom-button{
        text-align: center;
        justify-content: center;
        align-items: center;
        font-weight: 400;
        color: white;
        height: 33px;
        width: 90px;
        border-radius: 10px;
        font-size: 17px;
        background-color: #5f67df;
        margin-bottom: 10px;

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
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form class="d-flex" role="search">
                        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
                {{-- profile --}}
                <div class="flora d-flex align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal" class="d-flex align-items-center text-decoration-none">
                        <div class="rounded-circle overflow-hidden me-2" style="width: 35px; height: 35px;">
                            <img src="{{ asset('images/' . auth()->user()->gambar) }}" alt="Profile" class="img-fluid">
                        </div>
                        <p style="font-size: 16px; font-weight: 500; text-align: center; margin: 0;">Profile</p>
                    </a>
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
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="book-section">
                                <h2 style="margin-top: 30px" data-category="All">All Categories</h2>
                                <!-- View for showing books and loan request form -->
                                @foreach ($books as $item)
                                <div class="col-md-3 custom-col book-card" data-category="{{ $item->categories->pluck('name')->join(', ') }}" style="margin-top: 20px;">
                                    <div class="card shadow">
                                        <a href="{{ route('peminjam.detail', ['id' => $item->id]) }}" style="text-decoration: none;"> <!-- Tautan ke halaman selanjutnya -->
                                            <img src="{{ asset('storage/' . $item->image_book) }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title custom-text">{{ $item->title }}</h5>
                                                <p class="card-text" style="color: rgb(110, 110, 110);">{{ $item->categories->pluck('name')->join(', ') }}</p>
                                                <div class="row">

                                                    <div class="d-flex">
                                                        <img src="{{ asset('images/star1.png') }}" alt="bintang" style="height: 1.3pc; width: 1.3pc">
                                                        <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">{{ number_format($item->average_rating, 1) }}</p>

                                                        <!-- Form untuk meminjam buku -->
                                                        <button type="submit" class="btn btn-secondary" style="font-size: 12px; height: 30px; margin-left: 40px">online</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </a> <!-- Tutup tautan -->
                                    </div>
                                </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal fade scroll" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="profileView">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle overflow-hidden me-3" style="width: 70px; height: 70px;">
                                <img src="{{ asset('images/' . auth()->user()->gambar) }}" alt="Profile" class="img-fluid">
                            </div>
                            <div>
                                <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                <h5 class="mb-0">{{ auth()->user()->email }}</h5>
                            </div>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-primary mb-3" onclick="showEditProfile()">Edit Profile</button>
                            </div>
                        </div>
                        <h6>History Peminjaman Buku</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $index => $loan)
    @if ($loan->status != 'cancel')
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $loan->book->title }}</td>
            <td>{{ $loan->borrow_date }}</td>
            <td>{{ $loan->return_date }}</td>
            <td>{{ $loan->status }}</td>
            <td>
                @if ($loan->status == 'pending')
                    <form action="{{ route('cancel.loan', $loan->id) }}" method="POST" class="cancel-loan-form">
                        @csrf
                        <button type="button" class="btn btn-danger cancel-button">Cancel</button>
                    </form>
                @elseif ($loan->status == 'selesai')
                @php
                // Check apakah pengguna sudah memberikan ulasan untuk buku ini
                $userHasRated = $loan->book->ratings()->where('user_id', Auth::id())->exists();
            @endphp

            @if ($userHasRated)
                <form action="{{ route('borrow.again', $loan->id) }}" method="POST" class="borrow-again-form">
                    @csrf
                    <button type="submit" class="btn btn-secondary" style="margin-top: 10px">Pinjam Lagi</button>
                </form>
            @else
                <button class="btn btn-secondary ulasan-button" style="margin-top: 10px" data-book-id="{{ $loan->book->id }}" onclick="showRatingView(this)">Ulasan</button>
            @endif
        @endif

            </td>
        </tr>
    @endif
@endforeach



                            </tbody>
                        </table>

                    </div>
                    <div id="editProfileView" style="display: none;">
                        <!-- Profile Edit Form -->
                        <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="profile-picture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profile-picture" name="profile_picture" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary save-button">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="hideEditProfile()">Cancel</button>
                        </form>
                    </div>

                    <div id="RatingView" style="display: none;">
                        <!-- Rating Form -->
                        <form id="ratingForm" action="{{ route('store.rating') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" id="book-id" value="">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <div id="rating" class="star-rating">
                                    <span class="fa fa-star" data-rating="1"></span>
                                    <span class="fa fa-star" data-rating="2"></span>
                                    <span class="fa fa-star" data-rating="3"></span>
                                    <span class="fa fa-star" data-rating="4"></span>
                                    <span class="fa fa-star" data-rating="5"></span>
                                </div>
                                <input type="hidden" name="rating" id="rating-value" value="0">
                                <span id="selected-rating" class="text-muted">0</span>/5
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Review</label>
                                <textarea class="form-control" id="review" name="comment" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary save-rating">Submit</button>
                            <button type="button" class="btn btn-secondary" onclick="hideRatingView()">Cancel</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('#rating .fa-star');
    const ratingValue = document.getElementById('rating-value');
    const selectedRating = document.getElementById('selected-rating');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-rating');
            ratingValue.value = rating;
            selectedRating.textContent = rating;

            stars.forEach(star => {
                star.classList.remove('checked');
            });

            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('checked');
            }
        });
    });
});

function showRatingView(button) {
    const bookId = button.getAttribute('data-book-id');
    document.getElementById('book-id').value = bookId;
    document.getElementById('profileView').style.display = 'none';
    document.getElementById('RatingView').style.display = 'block';
}

function hideRatingView() {
    document.getElementById('profileView').style.display = 'block';
    document.getElementById('RatingView').style.display = 'none';
}

        </script>
    <script>
        $(document).ready(function() {
            // SweetAlert for cancel button
            $('.cancel-button').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('.cancel-loan-form');

                Swal.fire({
                    title: 'Apakah Anda yakin ingin mengcancel peminjaman?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Alertify for save button
            $('.save-button').on('click', function(e) {
                alertify.success('Profile updated successfully!');
            });

            // Alertify for returned button
            $('.returned-button').on('click', function(e) {
                alertify.success('Book returned successfully!');
            });

            // SweetAlert for pinjam lagi button
            $('.borrow-again-button').on('click', function(e) {
    e.preventDefault();
    var form = $(this).closest('.borrow-again-form');

    Swal.fire({
        title: 'Apakah Anda yakin ingin meminjam buku ini lagi?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// Event handler untuk ulasan-button
$('.ulasan-button').on('click', function() {
    showRatingView();
});

        });
    </script>


    <script>
        $(document).ready(function(){
            $('#All').addClass('show active');
            $('.animated-button[href="#All"]').addClass('active-button');
            updateCategoryTitle("All");

            $('.animated-button').click(function(event){
                event.preventDefault();

                $('.animated-button').removeClass('active-button');
                $(this).addClass('active-button');

                var targetCategory = $(this).data('category');
                filterBooks(targetCategory);
                updateCategoryTitle(targetCategory);

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
            $('#searchInput').on('input', function(){
                var searchText = $(this).val().toLowerCase();

                $('.book-card').each(function(){
                    var bookTitle = $(this).find('.card-title').text().toLowerCase();
                    if(bookTitle.includes(searchText)){
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
    <script>
        function handleLogout(event) {
            event.preventDefault();

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("logout") }}';

            var csrfTokenField = document.createElement('input');
            csrfTokenField.setAttribute('type', 'hidden');
            csrfTokenField.setAttribute('name', '_token');
            csrfTokenField.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfTokenField);

            document.body.appendChild(form);
            form.submit();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logout-link').addEventListener('click', handleLogout);
        });

        function showEditProfile() {
            document.getElementById('profileView').style.display = 'none';
            document.getElementById('editProfileView').style.display = 'block';
        }

        function hideEditProfile() {
            document.getElementById('profileView').style.display = 'block';
            document.getElementById('editProfileView').style.display = 'none';
        }




    </script>
</body>
</html>
