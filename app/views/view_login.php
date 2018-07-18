<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="media/css/login.css">
    <title>Login</title>
</head>
<body>
<form action="<?=PROJROOT?>auth/login" method="post">
    <label for="login">Логин</label>
    <input type="text" name="login" <?php if(!empty($errors["login"])): ?> class="error" <?php endif; ?> value="<?=@$old["login"] ?>" id="login">
    <?php if(!empty($errors["login"])): ?><span class="error-text span1"><?=$errors["login"]?></span><?php endif; ?>
    <label for="pass">Пароль</label>
    <input type="password" name="pass" <?php if(!empty($errors["pass"])): ?> class="error" <?php endif; ?> value="<?=@$old["pass"] ?>" id="pass">
    <?php if(!empty($errors["pass"])): ?><span class="error-text span2"><?=$errors["pass"]?></span><?php endif; ?>
    <input type="submit" value="Войти">
    <p>или</p>
    <a href="<?=PROJROOT."register"?>">Новый пользователь</a>
    <a href="<?=PROJROOT?>">Вернутся на главную</a>
</form>
</body>
</html>