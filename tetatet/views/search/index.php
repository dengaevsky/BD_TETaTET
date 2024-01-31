<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();

  $all_news = mysqli_query($connection, "SELECT * FROM news");
  $war_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%війна%'");
  $it_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%IT%'");
  $business_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%бізнес%'");

  if(isset($_POST['search_btn'])) {
      $search = $_POST['search'];
      $query_news = mysqli_query($connection, "SELECT * FROM news  WHERE title LIKE '%$search%'");
    } else {
      $query_news = mysqli_query($connection, "SELECT * FROM news");
    }
?>

<main id="main">
    <!-- ======= Search Results ======= -->
    <section id="search-result" class="search-result">
      <div class="container">
        <div class="row">
          <div class="col-md-9">

            <h3 class="category-title mt-5">Результати пошуку:</h3>
            <?php
              $query_news;
              while ($news = mysqli_fetch_assoc($query_news)){ ?>
                <div class="d-md-flex post-entry-2 small-img">
                  <a href="/news/view?id=<?=$news['id'] ?>" class="me-4 thumbnail">
                    <img src="/files/news/<?=$news['photo'] ?>_m.jpg" alt="" class="img-fluid">
                  </a>
                  <div>
                    <div class="post-meta"><span class="date"><?=$news['theme']?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime']?></span></div>
                    <h3><a href="/news/view?id=<?=$news['id'] ?>"><?=$news['title']?></a></h3>
                    <p><?=$news['description']?></p>
                    <div class="d-flex align-items-center author">
                    <div class="name">
                    <?php
                      $id_user  = $userModel->GetUserById($news['user_id']);
                    ?>
                    <span class="author mb-3 d-block">Автор: <?=$id_user['firstname'];?> <?=$id_user['lastname']?></span>
                  </div>
                    </div>
                    <? if($news['user_id'] == $user['id'] || $user['role'] == 1):?>
                    <div class="d-flex align-items-center author">
                      <a href="/news/edit?id=<?=$news['id'] ?>"><p class="btn btn-transparent border border-dark m-1">Редагувати</p></a>
                      <a href="/news/delete?id=<?=$news['id'] ?>"><p class="btn btn-transparent border border-dark m-1">Видалити</p></a>
                    </div>
                    <? endif; ?>
                  </div>
                </div>
            <?php   
              }
            ?>
  
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
</ul>

<div class="tab-content" id="pills-tabContent">

  <!-- latest -->
  <div class="tab-pane fade show active" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
  
  <?php
    $all_news;
    while ($news = mysqli_fetch_assoc($all_news)){ ?>
    <div class="post-entry-1 border-bottom">
      <div class="post-meta"><span class="date"><?=$news['theme'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
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
      <div class="post-meta"><span class="date"><?=$news['theme'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
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
      <div class="post-meta"><span class="date"><?=$news['theme'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
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
        <div class="post-meta"><span class="date"><?=$news['theme'] ?></span> <span class="mx-1">&bullet;</span> <span><?=$news['datetime'] ?></span></div>
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

            <div class="aside-block">
              <h3 class="aside-title">Відео</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->
          </div>

        </div>
      </div>
    </section> <!-- End Search Result -->

  </main><!-- End #main -->