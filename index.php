<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmora</title>
    <link rel="stylesheet" href="./style.css?v=1">
    <link rel="icon" type="image/svg+xml" href="image/F.svg">
    <link rel="stylesheet" href="./swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>
    <canvas id="canvas"></canvas>
    <section class="Header">
        <div class="Name">
            <a href="">
                <img src="image/Filmora.svg">
            </a>    
        </div>
        <div class="heart">
            <div class="Film">
                <p>Фильмы</p>
            </div>
            <div class="Mult">
                <p>Мультфильмы</p>
            </div>
            <div class="serial">
                <p>Сериалы</p>
            </div>
        </div>
        <div class="Poisc">
            <img src="image/search.svg">
            <input type="text" id="search-input" placeholder="Поиск">
        </div>
        <div class="Mess">
            <img src="image/notifications.svg">
        </div>
        <div class="Accaunt">
            <p>Войти</p>
        </div>
    </section>
    <section class="Top-Films">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0000`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0001`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0002`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0003`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0004`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0005`
                    UNION
                    SELECT title, poster_url, genre, duration, rating, release_year 
                    FROM `0006`
                    LIMIT 7";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="swiper-slide">';
                    echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 1000px; height: 500px; object-fit: cover; border-radius: 30px;">';
                        echo '<div class="film-info">';
                        echo '<div class="Rating">';
                            echo '<p>' . htmlspecialchars($row["rating"]) .'</p>';
                        echo '</div>';
                        echo '<div class="ostal">';
                            echo '<p>' . htmlspecialchars($row["duration"]) . '</p>';
                            echo '<p>' . htmlspecialchars($row["release_year"]) . '</p>';
                            echo '<p>' . htmlspecialchars($row["genre"]) . '</p>';
                        echo '</div>';
                            echo '</div>';
                    echo '</div>';
                    
                }
                } else {
                    echo '<div class="swiper-slide">Нет данных</div>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <section class="pro">
        <div class="Podpiska">
            <div class="Name_pro">
                <p>Подписка</p>
                <div class="name">
                    <h1>Pro</h1>
                </div>
            </div>
            <div class="Prev">
                <p>Ваш кинотеатр дома</p>
            </div>
        </div>
    </section>
    
    <script src="script.js"></script>
</body>
</html>

<?php

$conn = new mysqli("localhost", "root", "root", "movies_db");

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT title FROM movies LIMIT 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="swiper-slide">' . htmlspecialchars($row["title"]) . '</div>';
    }
} else {
    echo '<div class="swiper-slide">Ошибка: Нет данных или запрос не выполнен</div>';
}

$conn->close();
?>

ветренный