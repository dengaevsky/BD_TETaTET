<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();

  $all_news = mysqli_query($connection, "SELECT * FROM news");
  $all2_news = mysqli_query($connection, "SELECT * FROM news");
  $war_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%війна%'");
  $it_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%IT%'");
  $business_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%бізнес%'");
  $politics_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%політика%'");
  
  $last_news = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id");
  $last_news2 = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 3");
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
    <section>
      <div class="container">
        <div class="row">

        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Категорія: Останні новини</h3>
        <?php foreach($lastNews as $news) : ?>

          <div class="d-md-flex post-entry-2 small-img">
              <a href="/news/view?id=<?=$news['id'] ?>" class="me-4 thumbnail">
              <? if (is_file('files/news/'.$news['photo'].'_b.jpg')) : ?>
                    <img src="/files/news/<?=$news['photo'] ?>_b.jpg" alt="" class="img-fluid">
                <? else: ?>
                    <svg class="bd-placeholder-img figure-img img-fluid rounded float-start"  width="367.75" height="367.75" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="white"></rect></svg>
                <? endif; ?>
              </a>
              <div>
                <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime']?></span></div>
                <h3><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h3>
                <p><?=$news['description'] ?></p>
                <div class="d-flex align-items-center author">
                  <div class="name">
                    <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <p class="m-0 p-0">Автор: <?=$id_user['firstname'];?> <?=$id_user['lastname']?></p>
                  </div>
                </div>
                <? if($news['user_id'] == $user['id'] || $user['role'] == 1):?>
                <div class="d-flex align-items-center author">
                  <a href="/news/edit?id=<?=$news['id'] ?>" class="me-1"><button type="button" class="btn btn-light border border-secondary"><p class="m-1">Редагувати</p></button></a>
                  <a href="/news/delete?id=<?=$news['id'] ?>" class="me-1"><button type="button" class="btn btn-light border border-secondary"><p class="m-1">Видалити</p></button></a>
                </div>
                <? endif; ?>
              </div>
            </div>

        <?php endforeach; ?>
          </div>
        
          <div class="col-md-3">
            <div class="aside-block">
              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="true">Останні</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-war-tab" data-bs-toggle="pill" data-bs-target="#pills-war" type="button" role="tab" aria-controls="pills-war" aria-selected="false">Війна</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-it-tab" data-bs-toggle="pill" data-bs-target="#pills-it" type="button" role="tab" aria-controls="pills-it" aria-selected="false">IT</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-business-tab" data-bs-toggle="pill" data-bs-target="#pills-business" type="button" role="tab" aria-controls="pills-business" aria-selected="false">Бізнес</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-politics-tab" data-bs-toggle="pill" data-bs-target="#pills-politics" type="button" role="tab" aria-controls="pills-politics" aria-selected="false">Політика</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- latest -->
                <div class="tab-pane fade show active" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                
                <?php
                  $last_news;
                  while($news = mysqli_fetch_assoc($last_news)){?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                    <h2 class="mb-2"><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h2>
                    <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                <?php   
                  }
                ?>

                </div> <!-- End latest -->

                <!-- war -->
                <div class="tab-pane fade" id="pills-war" role="tabpanel" aria-labelledby="pills-war-tab">
                  
                <?php
                  $war_news;
                  while ($news = mysqli_fetch_assoc($war_news)){ ?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                    <h2 class="mb-2"><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h2>
                    <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                <?php   
                  }
                ?>

                </div> <!-- End war -->

                <!-- IT -->
                <div class="tab-pane fade" id="pills-it" role="tabpanel" aria-labelledby="pills-it-tab">
                  
                <?php
                  $it_news;
                  while ($news = mysqli_fetch_assoc($it_news)){ ?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                    <h2 class="mb-2"><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h2>
                    <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                <?php   
                  }
                ?>

                </div> <!-- End IT -->

                <!-- business -->
                <div class="tab-pane fade" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                  
                  <?php
                    $business_news;
                    while ($news = mysqli_fetch_assoc($business_news)){ ?>
                    <div class="post-entry-1 border-bottom">
                      <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                      <h2 class="mb-2"><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h2>
                      <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                  <?php   
                    }
                  ?>

                  </div> <!-- End business -->

                  <!-- politics -->
                <div class="tab-pane fade" id="pills-politics" role="tabpanel" aria-labelledby="pills-politics-tab">
                  
                  <?php
                    $politics;
                    while ($news = mysqli_fetch_assoc($politics_news)){ ?>
                    <div class="post-entry-1 border-bottom">
                      <div class="post-meta"><span class="date"><?=$news['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
                      <h2 class="mb-2"><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title'] ?></a></h2>
                      <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                  <?php   
                    }
                  ?>

                  </div> <!-- End politics -->

              </div>
              </div>

            <div class="aside-block">
              <h3 class="aside-title">Відео</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=dPUVzz8G-W4" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="assets/img/post-landscape-9.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->

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
          <li><a href="http://tetatet/news"><i class="bi bi-chevron-right"></i>Новини</a></li>
          <li><a href="http://tetatet/teleprogram"><i class="bi bi-chevron-right"></i>Телепрограма</a></li>
          <li><a href="http://tetatet/comments"><i class="bi bi-chevron-right"></i>Чат</a></li>
          <li><a href="http://tetatet/contact"><i class="bi bi-chevron-right"></i>Контакти</a></li>
        </ul>
      </div>

      <div class="col-lg-6">
        <h3 class="footer-heading">Останні новини</h3>

        <?php
        foreach($last_news2 as $news){
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