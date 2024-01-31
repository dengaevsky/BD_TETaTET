<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();
  
  $all_news = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 5");
  $war_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%війна%'");
  $it_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%IT%'");
  $business_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%бізнес%'");
  $all_comments = mysqli_query($connection, "SELECT * FROM comments");
  
	function actionAdd($post_id)
	{
    //Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
    $connect = mysqli_connect('127.0.0.1:3306','root','','tetatet');

    //Создаем переменные со значениями, которые были получены с $_POST
    $message = $_POST['message'];
    $datetime = date('Y-m-d H:i:s');
    $userModel = new \models\Users();
    $user  = $userModel->GetCurrentUser();
    $post_id;
    $user_id = $user['id'];

    //Делаем запрос на добавление новой строки в таблицу
    mysqli_query($connect,"INSERT INTO `comments` (`id`, `message`, `datetime`, `post_id`, `user_id`) VALUES (NULL, '$message', '$datetime', '$post_id', '$user_id')");

    //Переадресация на страницу
    @header("Location: ". $_SERVER["REQUEST_URI"]); // редирект
    exit(); // если нужно прервать скрипт
  }


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

<main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
              <div class="post-meta"><span class="date"><?=$model['category'] ?></span></div>
              <h1 class="mb-5"><?=$model['title']?></h1>

              <div class="">
                <img src="/files/projects/<?=$model['photo'] ?>_b.jpg" class="img-fluid">
              </div>
              <p><?=$model['description']?></p>
              <p><?=$model['text']?></p>
              <? if($model['user_id'] == $user['id'] || $user['role'] == 1):?>
                <div class="d-flex align-items-center author">
                  <h3 class="pe-2">Дії над дописом:</h3>
                  <a href="/projects/edit?id=<?=$model['id'] ?>" class="me-1 p-1"><button type="button" class="btn btn-primary"><p class="m-1">Редагувати</p></button></a>
                  <a href="/delete?id=<?=$model['id'] ?>" class="me-1 p-1"><button type="button" class="btn btn-primary"><p class="m-1">Видалити</p></button></a>
                </div>
              <? endif; ?>
            </div><!-- End Single Post Content -->

            <!-- ======= Comments ======= -->
            <div class="comments">

                <?php 
                  $all_comments;
                  while ($comment = mysqli_fetch_assoc($all_comments)){
                    if($model['id'] == $comment['post_id']){
                      $id_user  = $userModel->GetUserById($comment['user_id'])?>
                      <h5 class="comment-title py-2"><? $count_comments?>Коментарі:</h5>
                      <div class="comment d-flex flex-column mb-4">

                      <div class="flex-grow-1 ms-2 ms-sm-3 pd-2">
                        <div class="comment-meta d-flex align-items-baseline">
                          <? if($id_user['role'] == 1) {?>
                            <h6 class="me-2"><?=$id_user['firstname'];?> <?=$id_user['lastname']?><b>(Адмін)</b></h6>
                            <? } else {?>
                              <h6 class="me-2"><?=$id_user['firstname'];?> <?=$id_user['lastname']?></h6>
                            <? };?>
                          <span class="text-muted"><?=$comment['datetime']?></span>
                        </div>

                        <div class="comment-body .mt-n2">
                        <?=$comment['message']?>
                        </div>

                      </div>

                      </div>
                <?
                    }
                  }
                ?>
              
            </div><!-- End Comments -->

            
            <!--IF ADMIN OR EDITOR(DELETE) -->
            <?if ($userModel->IsAuth()){?>
            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Залишити коментар</h5>
                <div class="row">
                  <form method="post" action="">

                    <div class="col-12 mb-3">
                    <textarea type="text" name="message" value="Напишіть коментар" id="message" class="form-control" id="comment-message" placeholder="Введіть ваш коментар" required></textarea>
                    </div>
                    <div class="col-12">
                    <input type="submit" name="submit" class="btn btn-primary" value="Викласти коментар">
                    </div>

                    <?php 
                      $post_id = $model['id'];
                      if($_POST['submit'] == true){
                        actionAdd($post_id);
                      }
                    ?>
                  </form>
                </div>
              </div>
            </div><!-- End Comments Form -->

            <?} else {?>
              <div class="row justify-content-center mt-5">
                <div class="col-lg-12">
                <h5 class="comment-title">Щоб залишити повідомлення, авторизуйтесь...</h5>
                </div>
              </div>
            <?}?>


          </div>

          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">
            <div class="tab-content" id="pills-tabContent">
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
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- latest -->
                <div class="tab-pane fade show active" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                
                <?php
                  $all_news;
                  while ($news = mysqli_fetch_assoc($all_news)){ ?>
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

              </div>
              </div>
          </div>

        </div>
      </div>
    </section> <!-- End Search Result -->

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<script src="/alien/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('text');
</script>