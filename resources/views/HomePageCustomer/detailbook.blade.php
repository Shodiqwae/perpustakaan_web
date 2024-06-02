<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Could Be Heroes</title>
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
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header h1 {
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
            <h1>We Could Be Heroes</h1>
            <p>Genre: Comedy, Adventure, Fantasy</p>
        </header>
        <main class="main-content">
            <div class="book-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum. Nam euismod mi in libero suscipit, vel vestibulum felis aliquam. Nullam eu leo justo. Duis eget elit ultricies, fermentum tortor non, gravida sapien. Duis sed neque massa. Integer ultricies, ipsum nec tincidunt suscipit, purus mi venenatis dui, non hendrerit nulla risus vel eros...</p>
                <div class="buttons">
                    <button class="read-now">Read now</button>
                    <button class="add-to-favorites">Add To Favorit</button>
                </div>
            </div>
            <div class="book-details">
                <img src="book-cover.jpg" alt="We Could Be Heroes">
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eros eu quam scelerisque fermentum eget in nisl. Fusce ac lobortis magna, eget tristique lorem. Duis fringilla nisl eget metus pretium, sit amet accumsan velit tincidunt. Donec ac dolor ultricies, vestibulum nunc non, eleifend orci. In hac habitasse platea dictumst. Integer ac volutpat ipsum.</p>
            </div>
        </section>
    </div>
</body>
</html>