<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "theatresite");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT id, title FROM `site` ";
$result = mysqli_query($conn, $sql);
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
$menu = "SELECT * FROM `site` WHERE id='$id'";
$result1 = mysqli_query($conn, $menu);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
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
    <title>Афиша</title>
</head>

<body>
    <header class="header">
        <div class="header-container ">
            <nav class="header-nav">
                <?php
                foreach ($result as $row) {
                    echo "<ul class='menu flex'";
                    echo "<li><a href='index.php?id=" . $row["id"] . "'>" . " " . $row["title"] . " " . "</a></li>";
                }
                echo "</ul>";
                ?>
            </nav>
        </div>
    </header>

    <main class="main">
        <section class="section">
            <div class="container main-container">
                <h1 class="container-header">
                    АФИША ТЕАТРОВ ВОЛГОГРАДАЫ
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