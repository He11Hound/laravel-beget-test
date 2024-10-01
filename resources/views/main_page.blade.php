<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Учебная вёрстка на html css</title>

    <link rel="stylesheet" href="{{ asset("css/xiaomi/style.css") }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <img class="logo" src="{{asset("assets/xiaomi/logo.jpg")}}" alt="logo">
                <nav class="menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="" class="menu__link">Описание</a>
                        </li>
                        <li class="menu__item">
                            <a href="" class="menu__link">Характеристики</a>
                        </li>
                        <li class="menu__item">
                            <a href="" class="menu__link">Стоимость</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container"></div>
    </main>
    <footer class="footer"></footer>
</body>
</html>
