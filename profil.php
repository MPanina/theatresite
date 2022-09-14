<?php
include 'connect.php';
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

    <main class="main">
        <section class="profile__section">
            <div class="container profile__container">
                <?php
                if (!isset($_SESSION['userid'])) {
                ?>
                    <script>
                        document.location.replace('http://theatresite/thatresite/auth.php')
                    </script>
                <?php
                }
                ?>
                <div class="profile-info__wrapper info">
                    <?php
                    $userSelect = "SELECT * FROM `user` WHERE id = '$userlogin'";
                    $userSelectResult = mysqli_query($conn, $userSelect);
                    $userSelectAssoc = mysqli_fetch_assoc($userSelectResult);
                    foreach ($userSelectResult as $userRow) {
                        echo "<h3 class='info__header'>" . $userRow['login'] . "</h3>";
                    }                  
                    ?>

                </div>
                <div class="profile-concert__wrapper concert-info">
                    <h2 class="concert-info__header">Ваши места</h2>
                    <?php
                    $sitSelect = "SELECT * FROM `theatrezal` WHERE reserved_by_id='$userlogin'";
                    $sitSelectResult = mysqli_query($conn, $sitSelect);
                    echo "<ul class='sit__list sit'>";
                    foreach ($sitSelectResult as $sitRow) {

                        echo "<li class='sit__item'>";
                        echo "<h3 class='sit__header'>" . "Номер места: " . "$sitRow[sit_num]" . "</h3>";
                        echo "<p class='sit__paragraph'>" . "Цена места: " . "$sitRow[sit_price] " . "&#8381" . "</p>";
                        echo "<p class='sit__paragraph'>" . "Расположение места: " . "$sitRow[sit_direction]" . "</p>";
                       
                        echo "</li>";
                    }
                    echo "</ul>";
                    ?>
                </div>
            </div>
        </section>
        <section class="section__concert-profile concert-profile">
            <div class="container concert-profile__container">
                <h2 class="concert-profile__header">Предложения</h2>
                <div class="concert-profile__wrapper">
                    <ul class="concert-profile__list">
                        <?php
                        $concertRandSelect = "SELECT * FROM `concerti` ORDER BY rand() limit 3";
                        $concertRandSelectResult = mysqli_query($conn, $concertRandSelect);
                        foreach ($concertRandSelectResult as $concertRandRow) {
                            echo "<li class='concert-profile__item'>";
                            echo "<img src='img/" . $concertRandRow['img'] . "' alt=''>";
                            echo "<div class='concert-profile__content__wrapper'>";
                            echo
                            "<h3 class='concert-profile__header'>" .
                                "<a href='#' class='concert__link'>" . $concertRandRow['name'] . "</a>" .
                                "</h3>";
                            echo "<time class='concert-profile__time'>" . "Дата: " . "$concertRandRow[date]" . "</time>";
                            echo "<span class='concert-profile__span'>" . "Группа: " . "$concertRandRow[group_name]" . "</span>";
                            echo "<span class='concert-profile__span'>" . "Жанр: " . "$concertRandRow[genre]" . "</span>";
                            echo "<div class='concert-profile__about__wrapper'>";
                            echo "<a href='concert.php?concertid=" . $concertRandRow['id'] . "' class='concert-profile__about'>" . "Просмотреть места" . "</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</li>";
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </section>

    </main>
</body>