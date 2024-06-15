<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            text-align: center;
            background: linear-gradient(to right, #3a6186, #89253e);
            color: white;
            padding: 50px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header h1, .header p {
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
            gap: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .read-now {
            background-color: #81a9ce;
            color: black;
            margin-top: 20px;
        }

        .add-to-favorites {
            background-color: #81a9ce;
            color: black;
            margin-top: 20px;
        }

        .reviews {
            margin-top: 10px;
            overflow-y: auto;
            flex: 1;
        }

        .review {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stars {
            color: gold;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>We Could Be Heroes</h1>
            <p>Tumbuhan Flores</p>
        </header>
        <main class="main-content">
            <div class="book-description">
                <p>"We Could Be Heroes" adalah novel karya Mike Chen yang mengisahkan tentang dua individu yang memiliki kekuatan super, yaitu Jamie Sorenson dan Zoe Wong. Meskipun mereka memiliki kemampuan luar biasa, kehidupan mereka jauh dari sempurna, dan masing-masing dari mereka sedang berjuang dengan masa lalu serta masalah pribadi mereka.
                    Jamie Sorenson dapat menghapus ingatan orang lain dan menggunakan kekuatan ini untuk merampok bank, dengan harapan mengumpulkan cukup uang untuk hidup nyaman tanpa harus bekerja keras. Namun, ia merasa terisolasi dan terasing karena kemampuan uniknya tersebut.Zoe Wong memiliki kekuatan super seperti kekuatan fisik yang luar biasa dan kecepatan. Namun, ia mengalami amnesia dan tidak dapat mengingat kehidupan masa lalunya. Zoe bekerja sebagai kurir dan berusaha mengungkap siapa dirinya yang sebenarnya sambil menghadapi kilasan ingatan yang tidak lengkap.
                </p>
                <div class="buttons">
                    <button class="read-now" id="readNowButton" onclick="window.location.href= '{{ route('peminjam.isidetail') }}'" >Read now</button>
                </div>
            </div>
            <div class="book-details">
                <img src="{{ asset('images/buku1.png') }}" alt="We Could Be Heroes">
                <div class="book-info">
                    <p>By Margaret Finnegan</p>
                    <p>⭐ 400 Pages</p>
                </div>
            </div>
        </main>
        <section class="reviews">
            <h2>Reviews</h2>
            <div class="review">
                <p><strong>Rape</strong></p>
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum.</p>
            </div>
            <div class="review">
                <p><strong>Manda</strong></p>
                <div class="stars">⭐⭐⭐⭐</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum.</p>
            </div>
            <div class="review">
                <p><strong>Bu Miranda</strong></p>
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum.</p>
            </div>
        </section>
    </div>

    <script>



    </script>
</body>
</html>

