<?php
$userModel = new \models\Users();
$name = $userModel->GetCurrentUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$MainTitle ?> | TETATET</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body style="background-color: #eee;">
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex flex-column align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between m-4">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>TETATET</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a href="/">Головна</a></li>
            <li><a href="/news">Новини</a></li>
            <li><a href="/teleprogram">Телепрограма</a></li>
            <li><a href="/projects">Телепроекти</a></li>
            <? if($name['role'] == 1) {?>
            <li class="dropdown"><a><span>Дії</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="http://tetatet/news/add">Додати новину</a></li>
                <li><a href="http://tetatet/teleprogram/add">Змінити телепрограму</a></li>
                <li><a href="http://tetatet/projects/add">Додати проект</a></li>
              </ul>
              </li>
            <? };?>
            <li><a href="/chat">Чат</a></li>
            <li><a href="/contact">Контакти</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="d-flex justify-content-center">
        <div class="position-relative">
          <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>

          <div class="search-form-wrap js-search-form-wrap">
            <form action="\search" class="search-form d-flex flex-row" method="POST">
              <button name="search_btn" class="icon bi-search border-0"></button>
              <input type="search" name="search" placeholder="Пошук" class="form-control" required="">
              <button class="btn js-search-close"><span class="bi-x"></span></button>
            </form>
          </div><!-- End Search Form -->
        </div>

        <div class="d-flex justify-content-center">
          <i class="bi bi-list mobile-nav-toggle"></i>
          <nav id="navbar" class="navbar2">
            <ul>
              <? if (!$userModel->IsAuth()) : ?>
                <li><a href="/users/login">Увійти</a></li>
                <li><a href="/users/register">Реєстрація</a></li>
              <? else : ?>
                <? if($name['role'] == 1) {?>
                  <ul><li><a href="/users/logout">Вийти <b><?=$name['firstname'];?></b>★</a></li></ul>
                  <? }else{?>
                    <ul><li><a href="/users/logout">Вийти <b><?=$name['firstname'];?></b></a></li></ul>
                  <? };?>
                </li>
              <? endif; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <? if($MessageText != null){?>
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <div class="mt-3 btn btn-outline-dark bg-dark text-white"><p class="m-2"><?=$MessageText?></p></div>
    </div>
    <?};?>
  </header><!-- End Header -->

	<!-- ======= Content ======= -->
	<?=$PageContent ?>


  <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
<div class="footer-legal">
  <div class="container">
	<div class="row justify-content-between">
	  <div class="col-md-12 text-center  mb-md-0">
		<div class="copyright">
		  © Авторські права <strong><span>tetatet</span></strong>. Усі права захищені
		</div>
		<div class="credits">
		  Сайт створив <a href="/">Гаєвський Денис</a>
		</div>
	  </div>
	</div>
  </div>
</div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script src="/alien/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('text');
</script>

</body>
</html>