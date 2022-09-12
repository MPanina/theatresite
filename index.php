<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "theatresite");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
} else {
    $posterSelect = "SELECT * FROM `poster`";
    $posterSelectResult = mysqli_query($conn, $posterSelect);
    $posterSelectRow = mysqli_fetch_array($posterSelectResult, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <title>Афиша</title>
</head>

<body>
    <header class="header">
        <div class="header-container ">
            <nav class="header-nav">
                <ul class="menu flex">
                    <li>
                        <a href="index.php" class="header-link">Афиша</a>
                    </li>
                    <li>
                        <a href="#">Новости</a>
                    <li>
                        <a href="reg.php">Регистарция</a>
                    </li>
                    </li>
                    <li>
                        <a href="#">Контакты</a>
                    </li>
                </ul>
                <?php
                echo "<ul class='header-cabinet'>";
                if (isset($_SESSION["userid"])) {
                    $currentID = $_SESSION["userid"];
                    $loginSelect = "SELECT login FROM `user` WHERE id = '$currentID'";
                    $loginResult = mysqli_query($conn, $loginSelect);
                    $loginFetch = mysqli_fetch_array($loginResult);
                    echo "<span class ='nameclass'>" . $loginFetch['login'] . "</span>";
                    echo "<a href='exit.php'>" . " выйти?" . "</a>";
                } else {
                    echo "<a href='auth.php'>" . "Авторизация" . "</a>";
                }
                echo "</ul>"
                ?>
            </nav>
        </div>
    </header>

    <main class="main">
        <section class="section">
            <div class="container main-container">
                <h1 class="container-header">
                    АФИША ТЕАТРОВ ВОЛГОГРАДА
                </h1>
                <p class="container header-info">На&nbsp;сайте представлена полная афиша всех главных театральных событий Волгограда.
                    Вы&nbsp;можете бронировать билеты, покупать онлайн и&nbsp;заказывать доставку на&nbsp;дом.</p>
            </div>
            <div class="poster">

                <ul class="poster-list">
                    <?php
                    foreach ($posterSelectResult as $posterRow) {
                        echo "<li class='poster-item'>";
                        echo "<img src='img/" . $posterRow['img'] . "' alt=''>";
                        echo "<div class='poster-content-wrapper'>";
                        echo "<h2 class='poster-header'>" .
                            "<a href='index.php?name=' class='poster-link'>" . $posterRow['name'] . "</a>" .
                            "</h2>";
                        echo "<span class='poster-span'>" . "$posterRow[date]" . "</span>";
                        echo "<span class='poster-span'>" . "$posterRow[place]" . "</span>";
                        echo "<span class='poster-span'>" . "$posterRow[price]" . "</span>";
                        echo "</div>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </section>
    </main>
</body>

</html>