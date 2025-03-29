<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmora</title>
    <link rel="stylesheet" href="style.css?=22">
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
        <a href="login/login.php">
            <div class="Accaunt">
                <p>Войти</p>
            </div>
        </a>
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
                    FROM `movies` WHERE id IN (1,2,3,13,14,21)
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
            <div class="hh1">
                <div class="podpiska">
                    <p>Подписка</p>
                    <div class="pro_name">
                        <p>Pro</p>
                    </div>
                </div>
                <div class="name">
                    <p>Ваш кинотеатр дома</p>
                </div>
                <div class="opis">
                    <p>новинки, эксклюзивы, любимые хиты - всё в одной подписке</p>
                </div>
                <div class="cena">
                    <div class="pp">
                        <p>1 месяц бесплатно</p>
                    </div>
                    <div class="pp1">
                        <p>далее- 199руб</p>
                    </div>
                </div>
                <div class="ohorm">
                    <div class="ohor">
                        <p>оформить подписку</p>
                    </div>
                    <div class="podrob">
                        <p>Подробнее</p>
                    </div>
                </div>
            </div>
            <div class="hh2">
                <div class="Phot">
                    <img class="One" src="./image/576x.svg" width="150px" height="200px">
                    <img class="Two" src="./image/Fallout.svg"  width="130px" height="175px">
                    <img class="Trhee" src="./image/600x900.svg"  width="110px" height="150px">
                    <img class="Four" src="./image/an.svg"  width="82px" height="120px">
                </div>
                <div class="FTR">
                    <p>более 100</p>
                </div>
                <div class="FTT">
                    <p>Фильмов, Сериалов</p>
                </div>
                <div class="FTT1">
                    <p>Мультфильмов, аниме</p> 
                </div>
            </div> 
        </div>   
    </section>
    <section class="reki">
        <div class="recom">
            <p>Рекомендации</p>
            <img src="./image/Component 1.svg">
        </div>
        <div class="FRR">
            <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT poster_url, duration, rating, subscription_type, title
                    FROM `movies` WHERE id IN (4,33,42,55,40,45,46,52,59,60)
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="F">';
                    echo '<div class="Film-recom">';
                    echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 200px; height: 300px; border-radius: 15px;">';
                        echo '<div class="film-info-F">';
                        echo '<div class="black-fon">';
                            echo '<div class="subscription_type">';
                                echo '<p>' . htmlspecialchars($row["subscription_type"]) .'</p>';
                            echo '</div>';
                            echo '<div class="Rating-F-recom">';
                                echo '<p>' . htmlspecialchars($row["rating"]) .'</p>';
                            echo '</div>';
                            echo '<div class="ostal-F">';
                                echo '<p>' . htmlspecialchars($row["duration"]) . '</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo '<div class="Film-recom">Нет данных</div>';
                }

                $conn->close();
                ?>
        </div>
    </section>
    <section class="Top-10">
        <div class="N-Top">
            <p>Топ-10 за месяц</p>
            <img src="./image/Component 1.svg">
        </div>
        <div class="Top-F">
            <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT poster_url, Number
                    FROM `movies` WHERE id IN (4,5,6,16,17,18,19,20,28,30)
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="Number">';
                        echo '<p>' . htmlspecialchars($row["Number"]) .'</p>';
                    echo '</div>';
                    echo '<div class="T-F">';
                        echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 255px; height: 385px; border-radius: 15px;">';
                    echo '</div>';
                }
                } else {
                    echo '<div class="Film-recom">Нет данных</div>';
                }

                $conn->close();
                ?>
        </div>
    </section>
    <section class="Serial">
        <div class="S-name">
            <p>сериалы</p>
            <img src="./image/Component 1.svg">
        </div>
        <div class="SER-F">
        <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT poster_url, duration, rating, title
                    FROM `movies` WHERE id IN (55,56,57,58,59,60,61,62,63,64,65)
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="F">';
                    echo '<div class="Film-recom">';
                    echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 200px; height: 300px; border-radius: 15px;">';
                        echo '<div class="film-info-F">';
                        echo '<div class="black-fon">';
                            echo '<div class="Rating-Q-recom">';
                                echo '<p>' . htmlspecialchars($row["rating"]) .'</p>';
                            echo '</div>';
                            echo '<div class="ostal-Q">';
                                echo '<p>' . htmlspecialchars($row["duration"]) . '</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo '<div class="Film-recom">Нет данных</div>';
                }

                $conn->close();
                ?>
        </div>
    </section>
    <section class="Mult_M">
        <div class="M-name">
            <p>МУльтфильмы</p>
            <img src="./image/Component 1.svg">
        </div>
        <div class="SRR-M">
        <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT poster_url, duration, rating, title
                    FROM `movies` WHERE id IN (85,86,87,88,89,90,91,92,93,94,95)
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="F">';
                    echo '<div class="Film-recom">';
                    echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 200px; height: 300px; border-radius: 15px;">';
                        echo '<div class="film-info-F">';
                        echo '<div class="black-fon">';
                            echo '<div class="Rating-Q-recom">';
                                echo '<p>' . htmlspecialchars($row["rating"]) .'</p>';
                            echo '</div>';
                            echo '<div class="ostal-Q">';
                                echo '<p>' . htmlspecialchars($row["duration"]) . '</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo '<div class="Film-recom">Нет данных</div>';
                }

                $conn->close();
                ?>
        </div>
    </section>
    <section class="Anim">
        <div class="A-name">
            <p>Аниме</p>
            <img src="./image/Component 1.svg">
        </div>
        <div class="SRA-A">
        <?php
                $conn = new mysqli("localhost", "root", "root", "movies_db");

                if ($conn->connect_error) {
                    die("Ошибка подключения: " . $conn->connect_error);
                }

                $sql = "SELECT poster_url, duration, rating, title
                    FROM `movies` WHERE id IN (115,116,117,118,119,120,121,122,123,124,125)
                    LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="F">';
                    echo '<div class="Film-recom">';
                    echo '<img src="' . htmlspecialchars($row["poster_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" style="width: 200px; height: 300px; border-radius: 15px;">';
                        echo '<div class="film-info-F">';
                        echo '<div class="black-fon">';
                            echo '<div class="Rating-Q-recom">';
                                echo '<p>' . htmlspecialchars($row["rating"]) .'</p>';
                            echo '</div>';
                            echo '<div class="ostal-Q">';
                                echo '<p>' . htmlspecialchars($row["duration"]) . '</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                } else {
                    echo '<div class="Film-recom">Нет данных</div>';
                }

                $conn->close();
                ?>
        </div>
    </section>
    <section class="podbor">
        <div class="POD1">
            <p>Служба Поддержки</p>
            <p>О нас</p>
            <p>Реклама</p>
            <p>Соглашение</p>
        </div>
        <div class="POD2">
            <img src="./image/Filmora.svg">
            <div class="App">
                <div class="RU">
                    <img src="./image/Rustore.svg">
                    <img src="./image/Rustore-t.svg">
                </div>
                <div class="APP-S">
                    <img src="./image/AppStore.svg">
                    <img src="./image/AppStore-t.svg">
                </div>
                <div class="APP-G">
                    <img src="./image/Appgallery.svg">
                    <img src="./image/Appgallery-t.svg">
                </div>
                <div class="G-Play">
                    <img src="./image/GooglePlay.svg">
                    <img src="./image/GooglePaly-t.svg">
                </div>
            </div>
            <div class="KOM">
                <p>© 2024 - 2025, (компания), 16+</p>
            </div>
        </div>
        <div class="POD3">
            <div class="KON">
                <div class="T">
                    <p>Telegram</p>
                    <div class="TG">
                        <img src="./image/TG.svg">
                    </div>
                </div>
                <div class="W">
                    <p>VK</p>
                    <div class="WK">
                        <img src="./image/WK.svg">
                    </div>
                </div>
                <div class="Y">
                    <p>YouTube</p>
                    <div class="YT">
                        <img src="./image/YT.svg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

    
    <script src="script.js"></script>
</body>
</html>