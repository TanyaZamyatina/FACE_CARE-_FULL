<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FACE CARE</title>
    <link rel="shortcut icon" href="/public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.min.css">
    <link rel="stylesheet" href="/public/css/user.min.css">
</head>
<body>
    
    <?php require 'public/blocks/header.php' ?>

    <section class="container user">
        <h2>Регистрация</h2>
        <form action="/user/reg" method="POST">
            <label for="name">Контактное лицо</label>
            <input id="name" type="text" name="name" placeholder="Введите имя" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">

            <label for="tel">Контактный телефон</label>
            <input id="tel" type="text" name="tel" pattern="^\+7 \(\d{3}\) \d{3}-\d{4}$" placeholder="Введите телефон" value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : ''; ?>">

            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Введите email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">

            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" placeholder="Введите пароль">

            <label for="re_password">Повторите пароль</label>
            <input id="re_password" type="password" name="re_password" placeholder="Введите пароль">

            <div class="error"><?php echo isset($data['message']) ? htmlspecialchars($data['message']) : ''; ?> </div>

            <button>Зарегистрироваться</button>
            <a href="/user/auth">У меня уже есть аккаунт</a>
        </form>
    </section>

    <?php require 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c688a46ba5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/public/js/slick.min.js"></script>
    <script src="/public/js/jquery.maskedinput.min.js"></script>
    <script src="/public/js/index.js"></script>
</body>
</html>