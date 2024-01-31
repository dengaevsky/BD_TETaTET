<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();

  $last_news = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 3");
  $all_projects = mysqli_query($connection, "SELECT * FROM projects");
?>

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="/assets/css/variables.css" rel="stylesheet">
  <link href="/assets/css/main.css" rel="stylesheet">
  <link href="css/form.css" rel="stylesheet">
  
<main id="main">
    <section style="min-height: 700px;">
      <div class="container">
        <div class="row">

        <div class="col-md-12" data-aos="fade-up">
            <h3 class="category-title">Категорія: Останні проекти</h3>
        <?php foreach($all_projects as $projects) : ?>

          <div class="d-md-flex post-entry-2 small-img">
              <a href="/projects/view?id=<?=$projects['id'] ?>" class="me-4 thumbnail">
              <? if (is_file('files/projects/'.$projects['photo'].'_b.jpg')) : ?>
                    <img src="/files/projects/<?=$projects['photo'] ?>_b.jpg" alt="" class="img-fluid">
                <? else: ?>
                    <svg class="bd-placeholder-img figure-img img-fluid rounded float-start"  width="367.75" height="367.75" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="white"></rect></svg>
                <? endif; ?>
              </a>
              <div>
                <div class="post-meta"><span class="date"><?=$projects['category'] ?></span></div>
                <h3><a href="/projects/view?id=<?=$projects['id'] ?>"><?=$projects['title'] ?></a></h3>
                <p><?=$projects['description'] ?></p>
                <div class="d-flex align-items-center author">
                  <div class="name">
                    <?php
                      $id_user  = $userModel->GetUserById($projects['user_id']);
                    ?>
                  </div>
                </div>
                <? if($projects['user_id'] == $user['id'] || $user['role'] == 1):?>
                <div class="d-flex align-items-center author">
                  <a href="/projects/edit?id=<?=$projects['id'] ?>" class="me-1"><button type="button" class="btn btn-light border border-secondary"><p class="m-1">Редагувати</p></button></a>
                  <a href="/projects/delete?id=<?=$projects['id'] ?>" class="me-1"><button type="button" class="btn btn-light border border-secondary"><p class="m-1">Видалити</p></button></a>
                </div>
                <? endif; ?>
              </div>
            </div>

        <?php endforeach; ?>
          </div>

        </div>
      </div>
    </section>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">

    <div class="row g-5">
      <div class="col-lg-4">
        <h3 class="footer-heading">TETATET</h3>
        <p>Новинний телеканал із найостаннішими новинами, зроблений командою професіоналів. Дізнавайся про цікаві події в світі ІТ прямо зараз!</p>
        <p><a href="about.html" class="footer-link-more">Дізнатися більше</a></p>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Навігація</h3>
        <ul class="footer-links list-unstyled">
          <li><a href="http://tetatet/"><i class="bi bi-chevron-right"></i>Головна</a></li>
          <li><a href="http://tetatet/projects"><i class="bi bi-chevron-right"></i>Новини</a></li>
          <li><a href="http://tetatet/teleprogram"><i class="bi bi-chevron-right"></i>Телепрограма</a></li>
          <li><a href="http://tetatet/comments"><i class="bi bi-chevron-right"></i>Чат</a></li>
          <li><a href="http://tetatet/contact"><i class="bi bi-chevron-right"></i>Контакти</a></li>
        </ul>
      </div>

      <div class="col-lg-6">
        <h3 class="footer-heading">Останні новини</h3>

        <?php
        foreach($last_news as $news){
        ?>
          <ul class="footer-links footer-blog-entry list-unstyled">
            <li>
              <a href="/news/view?id=<?=$news['id'] ?>" class="d-flex align-items-center">
                <img src="/files/news/<?=$news['photo'] ?>_s.jpg" alt="" class="img-fluid me-3">
                <div>
                  <div class="post-meta d-block"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                  <span><?=$news['title'] ?></span>
                </div>
              </a>
            </li>
          </ul>
        <? } ?>

      </div>
    </div>
  </div>
</div>
</footer>

<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<script src="/alien/ckeditor/ckeditor.js"></script>