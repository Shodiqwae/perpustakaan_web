<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Could Be Heroes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #334597a3;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .deskripsi {
            height: 200px;
            border-radius: 20px;
        }

        .back {
            transition: all 0.3s ease-in-out;
            font-family: "Dosis", sans-serif;
        }

        .back {
            width: 150px;
            height: 60px;
            border-radius: 50px;
            background-image: linear-gradient(135deg, #8197dc 0%, #a6a6a8 100%);
            box-shadow: 0 20px 30px -6px rgba(4, 15, 139, 0.5);
            outline: none;
            cursor: pointer;
            border: none;
            font-size: 24px;
            color: white;
        }

        .back:hover {
            transform: translateY(3px);
            box-shadow: none;
        }

        .back:active {
            opacity: 0.5;
        }

        .container {
            width: 90%;
            height: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            border-radius: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            background: linear-gradient(to right, #3a6186, #89253e);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header .header-content {
            text-align: center;
            margin-right: 120px;
            flex-grow: 1;
        }

        .header .header-content h1 {
            margin: 0;
        }

        .header .header-content p {
            margin: 0;
        }

        .main-content {
            display: flex;
            flex: 1;
            gap: 20px;
        }

        .book-description {
            flex: 2;
            overflow-y: auto;
            padding-right: 10px;
        }

        .book-details {
            flex: 1;
            text-align: center;
        }

        .book-details img {
            max-width: 100%;
            border-radius: 8px;
        }

        .book-info {
            margin-top: 10px;
        }

        .book-info p {
            margin: 5px 0;
        }

        .book-description p {
            text-align: justify;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            gap: 20px;
            margin-left: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .read-now {
            background-color: #3a6186;
            color: black;
            margin-top: 20px;
        }

        .add-to-favorites {
            background-color: #3a6186;
            color: black;
            margin-top: 20px;
        }

        .reviews {
            margin-top: 10px;
            overflow-y: auto;
            flex: 1;
        }

        .review {
            background-color: #dddddd;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <a href="{{ route('peminjam.home') }}" class="back-button-wrapper">
                <button class="back">< Back</button>
            </a>
            <div class="header-content">
                <h1>{{ $book->title }}</h1>
                <p>Category: {{ $book->categories->pluck('name')->join(', ') }}</p>
            </div>
        </header>

        <main class="main-content">
            <div class="book-description">
                <div class="deskripsi">
                    <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;font-size: 20px">Description Book :</p>
                    <p>{{ $book->description }}</p>
                </div>
                <div class="buttons">
                    <button class="add-to-favorites" style="background-color: #4f54b3;color:white;font-weight:600">Add To Favorit</button>
                    <form action="{{ route('borrow.book') }}" method="POST" style="margin-top:19px">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit" style="background-color: #4f54b3;color:white;font-weight:600">Borrow</button>
                    </form>
                </div>
            </div>
            <div class="book-details">
                <img src="{{ asset('storage/' . $book->image_book) }}" alt="{{ $book->title }}" style="height: 90%;width: 40%">
                <div class="book-info">
                    <p style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight: bold;font-size:18px">By: {{ $book->author }}</p>
                    <p style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight: bold;font-size:16px">Stock: {{ $book->stock }}</p>
                </div>
            </div>
        </main>
        <section class="reviews">
            <h2>Reviews</h2>
            <div class="review">
                <p><strong>Rape</strong></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum.</p>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                alertify.success('{{ session('success') }}');
            @endif
            @if(session('error'))
                alertify.error('{{ session('error') }}');
            @endif
        });
    </script>
</body>
</html>
