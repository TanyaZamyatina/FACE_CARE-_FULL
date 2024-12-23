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
  <link rel="stylesheet" href="/public/css/basket.min.css">
</head>
<body>
    
  <?php require 'public/blocks/header.php' ?>

  <section class="container basket">
    <h2>Корзина товаров</h2>
      <div>

        <?php if(!isset($data['products'])): ?>
          <p class="emptyBasket"><?=$data['empty']?></p>
        <?php else: ?>

        <div class="productsBasket">
          <?php if(isset($data['products'])): ?>
            <?php
              $sum = 0;

              $sumWithoutDiscount = 0;

              for($i = 0; $i < count($data['products']); $i++):
                $sumWithoutDiscount += $data['products'][$i]['price'];
                if($data['products'][$i]['sale']) {
                  $sum += ($data['products'][$i]['price'] - ($data['products'][$i]['price'] * ($data['products'][$i]['sale']/100)));
                } else {
                  $sum += $data['products'][$i]['price'];
                }
            ?>
                <div class="row">
                  <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                  <div>
                    <h4><?=$data['products'][$i]['title']?></h4>
                    <?php if($data['products'][$i]['sale']): ?>
                      <span class="new"><?=$data['products'][$i]['price'] - ($data['products'][$i]['price'] * ($data['products'][$i]['sale']/100))?> рублей</span>
                      <span class="old"><?=$data['products'][$i]['price']?> рублей</span>
                    <?php else: ?>
                      <span><?=$data['products'][$i]['price']?> рублей</span>
                    <?php endif; ?>
                    <form action="/basket" method="POST">
                      <input type="hidden" name="i_id" value="<?=$data['products'][$i]['id']?>">
                      <button type="submit" class="btn">Удалить из корзины</button>
                    </form>
                  </div>
                </div>
            <?php endfor; ?>
          <?php endif;?>
        </div>

        <div class="сostProductsBasket">
          <h4>Итого <?=$sum?> рублей</h4>
          <h4 class="sale">Скидка <?=$sumWithoutDiscount - $sum?> рублей</h4>
          <form action="/basket/confirm" method="post">
            <?php if(isset($sum)): ?>
              <input type="hidden" name="amount" value="<?=$sum?>">
              <button type="submit" class="btn сostProductsBasketBtn">Заказать</button>
            <?php endif; ?> 
          </form>
          <form action="/basket" method="POST">
            <input type="hidden" name="items_id">
            <button type="submit" class="btn сostProductsBasketBtn">Очистить корзину</button>
          </form>
        </div>
      </div>
    <?php endif;?>
  </section>

    <?php require 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c688a46ba5.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="/public/js/slick.min.js"></script>
    <script src="/public/js/jquery.maskedinput.min.js"></script>
    <script src="/public/js/index.js"></script>
</body>
</html>