<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="media/css/register.css">
    <title>Login</title>
</head>
<body>
    <form action="<?=PROJROOT?>auth/register" method="post">
        <dl>
            <dt><label for="login">Логин</label></dt>
            <dd><input type="text" name="login" <?php if(!empty($errors["login"])): ?> class="error" <?php endif; ?> value="<?=@$old["login"] ?>" id="login">
                <?php if(!empty($errors["login"])): ?><span class="error-text"><?=$errors["login"]?></span><?php endif; ?></dd>
            <dt><label for="pass">Пароль</label></dt>
            <dd><input type="password" name="pass" <?php if(!empty($errors["pass"])): ?> class="error" <?php endif; ?> value="<?=@$old["pass"] ?>" id="pass">
                <?php if(!empty($errors["pass"])): ?><span class="error-text"><?=$errors["pass"]?></span><?php endif; ?></dd>
            <dt><label for="pass2">Подтвердить пароль</label></dt>
            <dd><input type="password" name="pass2" <?php if(!empty($errors["pass2"])): ?> class="error" <?php endif; ?> value="<?=@$old["pass2"] ?>" id="pass2">
                <?php if(!empty($errors["pass2"])): ?><span class="error-text"><?=$errors["pass2"]?></span><?php endif; ?></dd>
            <input type="submit" value="Зарегестрироватся">
            <a href="<?=PROJROOT?>">На главную</a>
        </dl>
    </form>
    <script src="media/js/script.js"></script>
</body>
</html>