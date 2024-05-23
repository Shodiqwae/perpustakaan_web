<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/homeC.css") }}">

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
            <div class="sidebar d-lg-block collapse" id="navbarTogglerDemo02" style="background-color: rgb(41, 41, 171); ">
                <a href="/HomePageCustomer" class="active" style="color: white"> Discover </a>
                <a href="/YourLibrary" class="sidebar-custom" style="color: white"> My Library </a>
                <a href="/Favorite" class="sidebar-custom" style="color: white">Favorite</a>
                <a href="login" class="sidebar-custom" style="color: white"> Log out </a>
            </div>
            {{-- ini adalah isi buku --}}
            <div class="content ">
                    <div class="content bg-white scrollable-content  nav-pills justify-content-left" style=" border-radius: 20px; font-family: Inknut-Bold; height: 100vh">
                        <div class="row">
                            <h2>Category</h2>
                        </div>
                        <ul class="list-inline" style="margin-top: 20px">
                            <li class="list-inline-item ">
                                <button href="#All" class="animated-button " data-toggle="pill">
                                    <span>All</span>
                                    <span></span>
                                  </button>
                            </li>
                            <li class="list-inline-item">
                                <button href="" class="animated-button">
                                    <span>Novel</span>
                                    <span></span>
                                  </button>
                            </li>
                            <li class="list-inline-item">
                                <button class="animated-button">
                                    <span>Comic</span>
                                    <span></span>
                                  </button>
                            </li>
                            <li class="list-inline-item">
                                <button class="animated-button">
                                    <span>History</span>
                                    <span></span>
                                  </button>
                            </li>
                            <li class="list-inline-item">
                                <button href="" class="animated-button">
                                    <span>Knowledge</span>
                                    <span></span>
                                  </button>
                            </li>
                          </ul>




                            <div class="row" style="margin-top: 30px">
                                <h2>Recommended</h2>
                                <div class="container">
                                    <div class="row">
                                       <div class="col-md-3 custom-col" style="margin-top: 20px">
                                           <div class="card shadow">
                                               <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                               <div class="card-body">
                                                   <h5 class="card-title custom-text" >The Hike To Home</h5>
                                                   <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                   <div class="row">
                                                       <div class="d-flex ">
                                                       <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                       <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                       <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-3 custom-col" style="margin-top: 20px">
                                           <div class="card shadow">
                                               <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                               <div class="card-body">
                                                   <h5 class="card-title custom-text" >The Hike To Home</h5>
                                                   <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                   <div class="row">
                                                       <div class="d-flex ">
                                                       <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                       <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                       <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-3 custom-col" style="margin-top: 20px">
                                           <div class="card shadow">
                                               <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                               <div class="card-body">
                                                   <h5 class="card-title custom-text" >The Hike To Home</h5>
                                                   <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                   <div class="row">
                                                       <div class="d-flex ">
                                                       <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                       <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                       <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-3 custom-col" style="margin-top: 20px">
                                           <div class="card shadow">
                                               <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                               <div class="card-body">
                                                   <h5 class="card-title custom-text" >The Hike To Home</h5>
                                                   <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                   <div class="row">
                                                       <div class="d-flex ">
                                                       <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                       <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                       <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-3 custom-col" style="margin-top: 20px">
                                           <div class="card shadow">
                                               <img src="{{ asset('images/buku1.png') }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                               <div class="card-body">
                                                   <h5 class="card-title custom-text" >The Hike To Home</h5>
                                                   <p class="card-text" style="color: rgb(110, 110, 110);">Novel</p>
                                                   <div class="row">
                                                       <div class="d-flex ">
                                                       <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                       <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                       <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       </div>
                                    </div>
                            </div>
                            <div class="tab-content">

                                <div id="All" class="tab-pane fade show ">
                                    <h2 style="margin-top: 30px">All Books</h2>
                                    <div class="row">
                                        @foreach ($books as $item)

                                        <div class="col-md-3 custom-col" style="margin-top: 20px">
                                            <div class="card shadow">
                                                <img src="{{ asset('storage/' . $item->image_book) }}" class="card-img-top" alt="kepo" style="height: 30vh; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title custom-text" >{{ $item->title }}</h5>
                                                    <p class="card-text" style="color: rgb(110, 110, 110);">{{ $item->categories->pluck('name')->join(', ') }}</p>
                                                    <div class="row">
                                                        <div class="d-flex ">
                                                            <img src="{{ asset('images/star1.png') }}" alt="bintanh" style="height: 1.3pc; width: 1.3pc">
                                                            <p style="font-size: 14px; color: rgb(110, 110, 110); margin-left: 10px">4.5</p>
                                                            <button class="btn btn-secondary " style="font-size: 12px; height: 30px; margin-left: 40px"> online </button>
                                                        </div>
                                                    </div>
                                                </div>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tambahkan skrip JavaScript untuk mengubah warna latar belakang tautan saat dipilih
        $(document).ready(function(){
            $('.animated-button').click(function(){
                $('.animated-button').css({
                    'background-color': 'blue',
                    'color': '', // Reset warna teks semua tautan
                    'box-shadow': '' // Reset bayangan semua tautan
                });

                $(this).css({
                    'background-color': 'blue',
                    'color': 'white',
                    'box-shadow': '0 0 0 5px #010a8a'
                });
            });

            $('.animated-button[data-target="#All"]').click(function(){
                $('#All').tab('show');
            });
        });
        </script>

</body>
</html>
