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
    <link rel="stylesheet" href="/public/css/slick.css">
</head>
<body>

    <?php require 'public/blocks/header.php' ?>

    <main class="main">
        <div class="container">
        <div class="description">
            <div class="img"><img class="logo" src="/public/img/FACE_CARE.png" alt="FACE CARE"></div>
            <h1>Профессиональная косметика по уходу за лицом</h1>
            <p>Добро пожаловать в FACE CARE — ваш надежный источник профессиональной косметики для ухода за лицом. Мы предлагаем широкий ассортимент высококачественных продуктов, разработанных для удовлетворения потребностей вашей кожи. Наши формулы основаны на передовых технологиях и натуральных ингредиентах, чтобы обеспечить вам здоровый и сияющий вид. Откройте для себя секреты красоты с FACE CARE!</p>
        </div>
        </div>
    </main>

    <section class="container catalog" id="catalog">
        <div>
            <img src="/public/img/Крема.jpg" alt="Крема">
            <h2><a href="/categories/cream">Крема</a></h2>
        </div>
        <div>
            <img src="/public/img/Массажеры.jpg" alt="Массажеры">
            <h2><a href="/categories/massager">Массажеры</a></h2>
        </div>
        <div>
            <img src="/public/img/Продукция_для_век.jpg" alt="Продукция для век">
            <h2><a href="/categories/eyelids">Продукция для век</a></h2>
        </div>
            <div>
            <img src="/public/img/Средства_для_умывания.jpg" alt="Средства для умывания">
            <h2><a href="/categories/washing">Средства для умывания</a></h2>
        </div>
        <div>
            <img src="/public/img/Сыворотки.jpg" alt="Сыворотки">
            <h2><a href="/categories/serum">Сыворотки</a></h2>
        </div>
        <div>
            <img src="/public/img/Тоники.jpg" alt="Тоники">
            <h2><a href="/categories/tonic">Тоники</a></h2>
        </div>
    </section>

    <section class="container sale" id="sale">
        <h2>Распродажа</h2>
        <div class="products" id="slider">
            <?php for($i = 0; $i < count($data['sale']); $i++): ?>
                <div>
                    <div class="image">
                        <img src="/public/img/<?=$data['sale'][$i]['img']?>" alt="<?=$data['sale'][$i]['title']?>">
                        <div class="percent"><?=$data['sale'][$i]['sale']?>%</div>
                    </div>
                    <p><a href="/product/<?=$data['sale'][$i]['id']?>"><?=$data['sale'][$i]['title']?></a></p>
                    <div class="price">
                        <span class="new"><?=$data['sale'][$i]['price'] - ($data['sale'][$i]['price'] * ($data['sale'][$i]['sale']/100))?> рублей</span>
                        <span class="old"><?=$data['sale'][$i]['price']?> рублей</span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>

    <section class="container blog" id="blog">
        <?php for($i = 0; $i < count($data['article']); $i++): ?>
            <div class="article">
                <?php if ($i % 2 == 0): // Четные индексы ?>
                    <img src="/public/img/<?=$data['article'][$i]['img']?>" alt="Девушка">
                <?php endif; ?>

                <div>
                    <h2><?=$data['article'][$i]['title']?></h2>
                    <p><?=$data['article'][$i]['anons']?></p>

                    <form action="/blog/index" method="POST">
                        <input type="hidden" name="id" value="<?=$data['article'][$i]['id']?>">
                        <button class="button">Подробнее</button>
                    </form>
                </div>

                <?php if ($i % 2 != 0): // Нечетные индексы ?>
                    <img src="/public/img/<?=$data['article'][$i]['img']?>" alt="Девушка">
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </section>

    <?php require 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c688a46ba5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/public/js/slick.min.js"></script>
    <script src="/public/js/jquery.maskedinput.min.js"></script>
    <script src="/public/js/index.js"></script>
</body>
</html>
