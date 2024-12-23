<header>
  <div class="container header-top">
    <a href="/"><img class="logo" src="/public/img/FACE_CARE.png" alt="FACE CARE"></a>
    <div class="menu"><i class="fas fa-bars"></i></div>
    <ul>
      <li><a href="/#catalog">Каталог</a></li>
      <li><a href="/#sale">Распродажа</a></li>
      <li><a href="/#blog">Блог</a></li>
      <li><button class="search icon" type="button"><i class="fa-solid fa-magnifying-glass"></i></button></li>

      <?php if(!isset($_COOKIE['email']) || $_COOKIE['email'] == ''): ?>
        <li><a href="/user/reg"><i class="fa-solid fa-user"></i></a></li>  
      <?php else: ?>
        <li><a href="/user/dashboard"><i class="fa-solid fa-user"></i></a></li> 
      <?php endif; ?>

      <li><a href="/basket/index">
        <i class="fa-solid fa-cart-shopping"></i>

        <?php
          require_once 'app/models/BasketModel.php';
          $basketModel = new BasketModel();
        ?>

        <?php if($basketModel->countItems() > 0): ?>
          <span class="countBasket"><?=$basketModel->countItems()?></span>
        <?php endif;?>

      </a></li>  
    </ul>
  </div>

  <div class="container mobile-menu">
    <ul>
      <li><a href="/#catalog">Каталог</a></li>
      <li><a href="/#sale">Распродажа</a></li>
      <li><a href="/#blog">Блог</a></li>
      <li><button class="search icon" type="button"><i class="fa-solid fa-magnifying-glass"></i></button></li>

      <?php if(!isset($_COOKIE['email']) || $_COOKIE['email'] == ''): ?>
        <li><a href="/user/reg"><i class="fa-solid fa-user"></i></a></li>  
      <?php else: ?>
        <li><a href="/user/dashboard"><i class="fa-solid fa-user"></i></a></li> 
      <?php endif; ?>
      
      <li>
        <a href="/basket/index">
          <i class="fa-solid fa-cart-shopping"></i>

          <?php if($basketModel->countItems() > 0): ?>
            <span class="countBasket"><?=$basketModel->countItems()?></span>
          <?php endif;?>
        </a>
      </li>  
    </ul>
  </div>

  <div class="header-search">
    <form class="container formSearch">
      <input class="input" type="search" placeholder="Найти...">
      <button class="icon" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>
</header>