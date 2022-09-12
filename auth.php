<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "theatresite");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
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
            </nav>
        </div>
    </header>

    <main class="main">
        <section class="section">
            <div class="container auth-container">

                <form action="auth.php" method="POST">
                    <h2>Введите данные для авторизации</h2>
                    <p>Логин: <input type="text" name="login"></p>
                    <p>Пароль: <input type="password" name="password"></p>
                    <p><input type="submit" value="Отправить"></p>
                </form>
                <?php
                if (isset($_POST["login"]) && isset($_POST["password"])) {
                    $login = $_POST["login"];
                    $auth = "SELECT * FROM `user` WHERE login='$login'";
                    $authResult = mysqli_query($conn, $auth);
                    $authAssoc = mysqli_fetch_assoc($authResult);
                    if (!empty($authAssoc)) {
                        $hash = $authAssoc['password'];
                        if (password_verify($_POST['password'], $hash)) {
                            $userid = $authAssoc['id'];
                            $_SESSION["userid"] = $userid;
                            echo "Авторизация успешна";
                        } else {
                            echo "Пароль неверный";
                        }
                    } else {
                        echo "Пользователя с таким логином не существует(";
                    }
                }

                ?>
            </div>
        </section>
    </main>
</body>

</html>