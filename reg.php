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
            <div class="container reg-container">
                <form action="reg.php" method="POST" enctype="multipart/form-data">
                    <h2>Введите данные для регистрации</h2>
                    <p>Логин: <input type="text" name="login" required></p>
                    <p>Пароль: <input type="password" name="password" required></p>
                    <p>Выберите файл для аватарки: <input type="file" name="filename" size="10" required></p>
                    <p><input type="submit" name="submitreg" value="Отправить"></p>

                    <?php

                    if (isset($_POST['submitreg'])) {
                        $name = $_FILES["filename"]["name"];
                        $type = $_FILES["filename"]["type"];
                        $path = __DIR__ . '/img/';
                        move_uploaded_file($_FILES["filename"]["tmp_name"], $path . $name);
                        $login = $_POST["login"];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $userInsertion = "INSERT INTO `user` (`login`, `password`, `type`) VALUES ('$login', '$password', '$type')";
                        if ($conn->query($userInsertion)) {
                            echo "<p class='reg__paragraph'>" . "Регистрация прошла успешно" . "</p>";
                           
                        } else {
                            echo "<p>" . "Ошибка:" . $conn->error . "</p>";
                        }
                    }

                    ?>
                </form>
            </div>
        </section>
    </main>
</body>

</html>