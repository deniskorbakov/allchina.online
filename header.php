<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-8 link-secondary fw-bolder">Главная</a></li>
      <li><a href="china_calendar.php" class="nav-link px-2 link-dark">Китайский календарь</a></li>
      <li><a href="faq.php" class="nav-link px-2 link-dark">О нас</a></li>
    </ul>
<?php
error_reporting(E_ERROR);
if ($_COOKIE['user'] != NULL) : ?>
    <div class="col-md-3 text-end">
        <a class="btn btn-outline-success" href="user_account.php" role="button">Кабинет пользователя</a>
    </div>

<?php else : ?>
    <div class="col-md-3 text-end">
        <a class="btn btn-outline-success" href="reg.php" role="button">Зарегистрироваться</a>
        <a class="btn btn-success" href="aut.php" role="button">Авторизоваться</a>
    </div>
<?php endif; ?>
</header>
</div>
<!-- <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-8 link-secondary fw-bolder">Главная</a></li>
        <li><a href="china_calendar.php" class="nav-link px-2 link-dark">Китайский календарь</a></li>
        <li><a href="faq.php" class="nav-link px-2 link-dark">О нас</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a class="btn btn-outline-success" href="reg.php" role="button">Зарегистрироваться</a>
        <a class="btn btn-success" href="aut.php" role="button">Авторизоваться</a>
      </div>
    </header>
  </div> -->