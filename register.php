<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Войти</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
    <footer>
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-2">
                        <h5>Навигация</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Главная</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Новости</a></li>
                            <li class="nav-item mb-2"><a href="blog.html" class="nav-link p-0 text-muted">Блог</a></li>
                            <li class="nav-item mb-2"><a href="reviews.html" class="nav-link p-0 text-muted">Отзовы</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О нас</a></li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <h5>Карта</h5>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3275.6670330654492!2d27.58881546867837!3d53.915096846844115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8ebbafb93571b1c2!2z0JPQstC-0LfQtNGM!5e0!3m2!1sru!2sby!4v1646574887807!5m2!1sru!2sby"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-4 offset-1">
                        <form>
                            <h5>Подписаться на рассылку</h5>
                            <p>Получайте свежие новости о акциях и новинках!</p>
                            <div class="d-flex w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>