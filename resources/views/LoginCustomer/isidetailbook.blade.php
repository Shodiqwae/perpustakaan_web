<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baca Novel</title>
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
            position: relative;
        }

        .header {
            text-align: center;
            background: linear-gradient(to right, #3a6186, #89253e);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .content p {
            text-align: justify;
            line-height: 1.6;
        }

        .navigation {
            display: flex;
            justify-content: center;
        }

        .navigation button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #81a9ce;
            color: black;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            background-color: #f6f6f6;
            color: black;
        }

        .review-section {
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .stars {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stars span {
            font-size: 24px;
            cursor: pointer;
        }

        .stars span.selected {
            color: gold;
        }

        .review-section textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .review-section button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #81a9ce;2sz
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-button">
            <button onclick="window.location.href= '{{ route('peminjam.detailonline') }}'" >Back</button>
        </div>
        <header class="header">
            <h1>Baca Novel - Flora Sinta Bella</h1>
        </header>
        <div class="content" id="novelContent">
            <!-- Isi novel akan dimuat di sini -->
            <p id="novelText">Novel "We Could Be Heroes" membuka dengan gambaran tentang dua tokoh utama: Jamie Sorenson dan Zoe Wong. Jamie adalah seorang pria muda yang memiliki kekuatan untuk menghapus ingatan orang lain, sementara Zoe adalah seorang wanita dengan kekuatan fisik dan kecepatan luar biasa, namun menderita amnesia. Keduanya hidup di sebuah kota yang bersemangat dengan aktivitas kejahatan yang dilakukan oleh individu-individu dengan kekuatan super.

                Jamie, yang merasa terasing dan kesepian karena kemampuan uniknya, menggunakan kekuatannya untuk melakukan tindak kejahatan, terutama merampok bank, dengan harapan mendapatkan cukup uang untuk hidup nyaman tanpa harus bekerja keras. Namun, ia merasa terjebak dalam siklus kejahatan dan merindukan hubungan manusia yang sebenarnya.

                Di sisi lain, Zoe berusaha mencari tahu siapa dirinya sebenarnya, karena dia kehilangan ingatan tentang masa lalunya. Dia bekerja sebagai kurir dan berusaha menemukan petunjuk tentang identitasnya yang sebenarnya, sambil terus mengalami kilasan ingatan yang tidak lengkap.

                Kisah mereka berdua dimulai ketika mereka secara tidak sengaja bertemu di sebuah kelompok dukungan untuk individu dengan kekuatan super. Awalnya, mereka saling curiga dan berselisih, terutama karena Jamie menggunakan kekuatannya untuk kejahatan, sementara Zoe memiliki moralitas yang lebih teguh.

                Namun, seiring berjalannya waktu, mereka mulai menyadari bahwa mereka memiliki lebih banyak kesamaan daripada yang mereka duga. Keduanya memiliki kesulitan dengan masa lalu mereka dan merasa terasing dari masyarakat. Ketika mereka memutuskan untuk bekerja sama untuk mengungkap misteri tentang asal-usul kekuatan super mereka dan hubungan mereka dengan kejadian masa lalu yang gelap, mereka menjadi semakin terikat satu sama lain.

                Perjalanan mereka membawa mereka melalui berbagai petualangan dan konfrontasi dengan musuh-musuh yang kuat. Mereka menemukan dukungan dan kekuatan dalam satu sama lain saat mereka bersama-sama menavigasi dunia yang penuh dengan kejahatan, rahasia, dan bahaya.

                Dalam perjalanannya, mereka juga menemukan teman-teman baru dan sekutu yang membantu mereka dalam pencarian mereka. Bersama-sama, mereka tidak hanya mengungkap kebenaran tentang diri mereka sendiri, tetapi juga menemukan kekuatan dalam persahabatan dan keyakinan diri mereka sendiri.

                Akhirnya, Jamie dan Zoe belajar bahwa meskipun masa lalu mereka mungkin penuh dengan kesalahan dan penyesalan, mereka memiliki kekuatan untuk membentuk masa depan mereka sendiri. Mereka memilih untuk menggunakan kekuatan mereka untuk kebaikan, membantu melindungi kota mereka dari kejahatan dan menjadi pahlawan yang sesungguhnya.

                "We Could Be Heroes" bukan hanya tentang kekuatan super, tetapi juga tentang hubungan manusiawi, penebusan, dan pencarian identitas diri. Ini adalah kisah tentang dua individu yang menemukan kekuatan dalam satu sama lain dan memilih untuk menggunakan kekuatan mereka untuk melakukan kebaikan di dunia yang penuh dengan kegelapan.</p>
        </div>
        <div class="navigation">
            <button id="nextBtn">Next</button>
        </div>
        <div class="review-section" id="reviewSection">
            <div class="stars" id="stars">
                <span data-value="1">&#9733;</span>
                <span data-value="2">&#9733;</span>
                <span data-value="3">&#9733;</span>
                <span data-value="4">&#9733;</span>
                <span data-value="5">&#9733;</span>
            </div>
            <textarea id="reviewText" placeholder="Write your review here..."></textarea>
            <button id="submitReviewBtn">Submit Review</button>
        </div>
    </div>

    <script>


        let currentPage = 0;

        document.getElementById('nextBtn').addEventListener('click', function() {
            if (currentPage < novelText.length - 1) {
                currentPage++;
                document.getElementById('novelText').innerText = novelText[currentPage];
            } else {
                document.getElementById('novelContent').style.display = 'none';
                document.getElementById('nextBtn').style.display = 'none';
                document.getElementById('reviewSection').style.display = 'flex';
            }
        });

        const stars = document.querySelectorAll('#stars span');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                stars.forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        document.getElementById('submitReviewBtn').addEventListener('click', function() {
            const selectedStar = document.querySelector('#stars span.selected');
            const reviewText = document.getElementById('reviewText').value;
            if (selectedStar && reviewText) {
                const rating = selectedStar.getAttribute('data-value');
                alert(Rating: ${rating}\nReview: ${reviewText});
            } else {
                alert('Please provide a rating and a review.');
            }
        });


    </script>
</body>
</html>
