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
    <link rel="stylesheet" href="/public/css/categories.min.css">
</head>
<body>

    <?php require 'public/blocks/header.php' ?>

    <section class="container">
        <h1 style="margin-top: 50px;"><?=$data['title']?></h1>
        <div class="container categories">
            <?php for($i = 0; $i < count($data['products']); $i++): ?>
                <div>
                    <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                    <h2><?=$data['products'][$i]['title']?></h2>
                    <p><?=$data['products'][$i]['anons']?></p>

                    <?php if($data['products'][$i]['sale']): ?>
                        <span class="new"><?=$data['products'][$i]['price'] - ($data['products'][$i]['price'] * ($data['products'][$i]['sale']/100))?> рублей</span>
                        <span class="old"><?=$data['products'][$i]['price']?> рублей</span>
                    <?php else: ?>
                        <p><?=$data['products'][$i]['price']?> рублей</p>
                    <?php endif; ?>

                    <div class="buttonContainer">
                        <a href="/product/<?=$data['products'][$i]['id']?>"><button class="btn">Детальнее</button></a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>

    <?php require 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c688a46ba5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/public/js/slick.min.js"></script>
    <script src="/public/js/jquery.maskedinput.min.js"></script>
    <script src="/public/js/index.js"></script>
</body>
</html>