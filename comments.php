<?php require 'connect.php'; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Комментарии</title>
    <link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#send").click(function() {
                var author = $("#author").val();
                var message = $("#message").val();
                $.ajax({
                    type: "POST",
                    url: "sendMessage.php",
                    data: {
                        "author": author,
                        "message": message
                    },
                    cache: false,
                    success: function(response) {
                        var messageResp = new Array('Ваше сообщение отправлено', 'Сообщение не отправлено Ошибка базы данных', 'Нельзя отправлять пустые сообщения');
                        var resultStat = messageResp[Number(response)];
                        if (response == 0) {
                            $("#author").val("");
                            $("#message").val("");
                            $("#commentBlock").append("<div class='comment'>Автор: <strong>" + author + "</strong><br>" + message + "</div>");
                        }
                        $("#resp").text(resultStat).show().delay(1500).fadeOut(800);
                    }
                });
                return false;
            });
        });
    </script>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Доставка еды</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Главная</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Еда
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="roll.html">Суши и роллы</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="mainDish.html">Основные блюда</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="salad.html">Салаты</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="soup.html">Супы</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="drinks.html">Напитки</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="dessert.html">Десерты</a></li>
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="blog.html">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contacts.html">Контакты</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main.php">Аторизация/Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Профиль</a>
                    </li>
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <form action="sendMessage.php" method="post" name="form">
        <p class="is-h">Автор:<br> <input name="author" type="text" class="is-input" id="author"></p>
        <p class="is-h">Текст сообщения:<br><textarea name="message" rows="5" cols="50" id="message"></textarea></p>
        <input name="js" type="hidden" value="no" id="js">
        <button type="submit" id='click' name="button" class="is-button">Отправить</button>
    </form>
    <div class="clear">

    </div>

    <p>Комментарии к статье</p>

    <div id="commentBlock">
        <?php
        $result = $mysql->query("SELECT * FROM `messages`");
        $comment = $result->fetch_assoc();
        do {
            echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>" . $comment['author'] . "</strong><br>" . $comment['message'] . "</div>";
        } while ($comment = $result->fetch_assoc());
        ?>
    </div>
</body>

</html>