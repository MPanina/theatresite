<?php include 'connect.php' ?>

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
        <section class="section concert-about concert-about__section">
            <div class="container concert-about__container">
                <?php
                $poster = $_GET['posterid'];
                $posterIDSelect = "SELECT * FROM `poster` WHERE id = '$poster'";
                $posterIDSelectResult = mysqli_query($conn, $posterIDSelect);
                $posterIDSelectRow = mysqli_fetch_array($posterIDSelectResult, MYSQLI_ASSOC);
                $posterZalSelect = "SELECT * FROM `theatrezal` WHERE idposter = '$poster' AND numbersit = 'свободное'";
                $posterZalSelectResult = mysqli_query($conn, $posterZalSelect);
                $posterZalAssoc = mysqli_fetch_assoc($posterZalSelectResult);
                foreach ($posterIDSelectResult as $posterIDRow) {
                    echo "<div class='concert-about__wrapper'>";
                    echo "<img src='img/" . $posterIDRow['img'] . "' class='concert__image alt=''>";
                    echo "<div class='concert-about__content__wrapper'>";
                    echo "<h2 class='about__header'>" .
                        "<a href='index.php?name=' class='about__link'>" . $posterIDRow['name'] . "</a>" .
                        "</h2>";
                    echo "<span class='concert-about__span'>" . "$posterIDRow[date]" . "</span>";
                    echo "<span class='concert-about__span'>" . "$posterIDRow[place]" . "</span>";
                    echo "<span class='concert-about__span'>" . "$posterIDRow[price]" . "</span>";
                    echo "</div>";
                }
             
           
                ?>
            </div>
        </section>
    </main>
</body>

</html>