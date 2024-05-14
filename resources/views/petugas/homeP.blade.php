<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .body-content {
            flex-grow: 1;
            display: flex;
        }

        .sidebar {
            background: #939090;
            color: aliceblue;
            overflow-y: auto;
            padding: 0;
            min-width: 250px; /* Set minimum width for the sidebar */
            flex-shrink: 0; /* Ensure sidebar doesn't shrink */
        }

        .content {
            background: #f0f0f0;
            padding: 30px;
            flex-grow: 1;
        }

        .sidebar a {
            color: #f0f0f0;
            text-decoration: none;
            display: block;
            padding: 13px;
        }

        .sidebar a:hover {
            background: #000000;
        }

        @media (max-width: 991.98px) {
            .body-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="main">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Petugas</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <div class="body-content">
            <div class="sidebar d-lg-block" id="navbarTogglerDemo02">
                    <a href="{{ route('dashboard') }}"> Dashboard</a>
                    <a href="{{ route('books') }}"> Books </a>
                    <a href="{{ route('rent') }}"> Rent Log </a>
                    <a href="{{ route('logout') }}"> Log out  </a>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum molestias tenetur officia ad sit soluta, minus consequuntur. Commodi nobis, obcaecati quod delectus perspiciatis inventore officiis provident nulla unde nihil error!</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
