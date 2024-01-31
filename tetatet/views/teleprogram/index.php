<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();
  
  $all_projects = mysqli_query($connection, "SELECT * FROM projects");
  $day1 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '1'");
  $day2 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '2'");
  $day3 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '3'");
  $day4 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '4'");
  $day5 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '5'");
  $day6 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '6'");
  $day7 = mysqli_query($connection, "SELECT * FROM teleprogram WHERE premiere LIKE '7'");
  
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


        <div class="col-md-12" style="min-height: 600px;">
            <div class="aside-block">
              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-day1-tab" data-bs-toggle="pill" data-bs-target="#pills-day1" type="button" role="tab" aria-controls="pills-day1" aria-selected="true">Понеділок</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day2-tab" data-bs-toggle="pill" data-bs-target="#pills-day2" type="button" role="tab" aria-controls="pills-day2" aria-selected="false">Вівторок</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day3-tab" data-bs-toggle="pill" data-bs-target="#pills-day3" type="button" role="tab" aria-controls="pills-day3" aria-selected="false">Середа</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day4-tab" data-bs-toggle="pill" data-bs-target="#pills-day4" type="button" role="tab" aria-controls="pills-day4" aria-selected="false">Четвер</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day5-tab" data-bs-toggle="pill" data-bs-target="#pills-day5" type="button" role="tab" aria-controls="pills-day5" aria-selected="false">П'ятниця</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day6-tab" data-bs-toggle="pill" data-bs-target="#pills-day6" type="button" role="tab" aria-controls="pills-day6" aria-selected="false">Субота</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-day7-tab" data-bs-toggle="pill" data-bs-target="#pills-day7" type="button" role="tab" aria-controls="pills-day7" aria-selected="false">Неділя</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-day1" role="tabpanel" aria-labelledby="pills-day1-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day1)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style="height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>


                <div class="tab-pane fade show" id="pills-day2" role="tabpanel" aria-labelledby="pills-day2-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day2)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style=" height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>


                <div class="tab-pane fade show" id="pills-day3" role="tabpanel" aria-labelledby="pills-day3-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day3)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style="height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>


                <div class="tab-pane fade show" id="pills-day4" role="tabpanel" aria-labelledby="pills-day4-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day4)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style=" height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>


                <div class="tab-pane fade show" id="pills-day5" role="tabpanel" aria-labelledby="pills-day5-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day5)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style="height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>



                <div class="tab-pane fade show" id="pills-day6" role="tabpanel" aria-labelledby="pills-day6-tab">                
                <?php
                while($teleprogram = mysqli_fetch_assoc($day6)){
                  $project = null;
                  foreach($all_projects as $key => $project_variant){
                    if($project_variant['id'] == $teleprogram['project_id']){
                      $project = $project_variant;
                    }
                  };
                  ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style="height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>



                <div class="tab-pane fade show active" id="pills-day7" role="tabpanel" aria-labelledby="pills-day7-tab">                
                <?php
                  while($teleprogram = mysqli_fetch_assoc($day7)){
                    $project = null;
                    foreach($all_projects as $key => $project_variant){
                      if($project_variant['id'] == $teleprogram['project_id']){
                        $project = $project_variant;
                      }
                    };
                    ?>
                  <div class="d-flex mt-3"><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><img src="/files/projects/<?=$project['photo'] ?>_m.jpg" style="height:fit-content; max-width:160px;" alt="" class="img-fluid me-3"></a>
                    <div class="border-bottom">
                      <div class="post-meta"><span class="date"><?=$project['category'] ?></span>                          
                        <? if($teleprogram['user_id'] == $user['id'] || $user['role'] == 1):?>
                          <div class="d-flex align-items-center author" style="gap: 10px;">
                            <a href="/teleprogram/edit?id=<?=$teleprogram['id'] ?>">Редагувати</a>
                            <a href="/teleprogram/delete?id=<?=$teleprogram['id'] ?>">Видалити</a>
                          </div>
                        <? endif; ?></div>
                      <h6 style="margin: 0;" >Дивіться о <strong><?=$teleprogram['start_time'] ?>-<?=$teleprogram['end_time'] ?></strong></h6>
                      <h3><a href="/projects/view?id=<?=$teleprogram['project_id'] ?>"><?=$project['title'] ?></a></h3>
                      <?php
                        $id_user  = $userModel->GetUserById($teleprogram['user_id']);
                      ?>
                    </div>
                  </div>
                <?php } ?>
                </div>


              </div>
              </div>

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
        <p>Новинний телеканал, зроблений командою професіоналів. Дізнавайся про останні новини прямо зараз!</p>
        <p><a href="#about" class="footer-link-more">Дізнатися більше</a></p>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Навігація</h3>
        <ul class="footer-links list-unstyled">
          <li><a href="http://tetatet/"><i class="bi bi-chevron-right"></i> Головна</a></li>
          <li><a href="http://tetatet/news"><i class="bi bi-chevron-right"></i> Новини</a></li>
          <li><a href="http://tetatet/teleprogram"><i class="bi bi-chevron-right"></i> Телепрограма</a></li>
          <li><a href="http://tetatet/chat"><i class="bi bi-chevron-right"></i> Чат</a></li>
          <li><a href="http://tetatet/contact"><i class="bi bi-chevron-right"></i> Контакти</a></li>
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