<?php

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <link rel="stylesheet" type="text/css" href="media/css/main.css">
</head>
<body>
    <header>
        <ul class="nav">
            <li><a href="<?=PROJROOT?>">Главная</a></li>
            <li><a href="<?=PROJROOT."news"?>">Новости</a></li>
            <li><a href="<?=PROJROOT."gallery"?>">Галерея</a></li>
        </ul>
        <form action="<?=PROJROOT?>auth/login" method="post">
            <?php if(!authIsAuth()): ?>
            <div class="log_block">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login">
            </div>
            <div class="pass_block">
                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass">
            </div>
            <?php endif; ?>
            <?php if(authIsAuth()): ?>
            <p class="wellcome">Здравствуй, <span class="user"><?=authCurrentUser()["login"]?></span></p>
            <?php endif; ?>
            <a href="<?=PROJROOT."register"?>">Новый пользователь</a>
            <?php if(authIsAuth()): ?>
            <a href="<?=PROJROOT."auth/logout"?>">Выйти</a>
            <?php endif; ?>
            <?php if(!authIsAuth()): ?>
            <input type="submit" value="Войти">
            <?php endif; ?>
        </form>
    </header>
    <main>
        <?= include $page ?>
    </main>
    <footer>
        <p>@All rights reserved</p>
    </footer>
<!--    <script src="media/js/script.js"></script>-->
</body>
</html>
