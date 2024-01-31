<?php
  $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');
  $all_projects1 = mysqli_query($connection, "SELECT * FROM projects");
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

    <section class="mt-5 pt-5" style="min-height:800px;">
        <div class="container">
            <h1 class="text-center">Заповнення</h1><br>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Оберіть день:</label>
                <select name="premiere" value="<?=$model['premiere']?>" class="form-control" id="premiere">
                    <option value="1">Понеділок</option>
                    <option value="2">Вівторок</option>
                    <option value="3">Середа</option>
                    <option value="4">Четвер</option>
                    <option value="5">П'ятниця</option>
                    <option value="6">Субота</option>
                    <option value="7">Неділя</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="project_id" class="form-label">Телепрограма:</label>
                <select name="project_id" value="<?=$model['project_id']?>" class="form-control" id="project_id">
                <?php
                  while($project = mysqli_fetch_assoc($all_projects1)){?>
                  <option value="<?=$project['id'];?>"><?=$project['title'];?></option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Починається о:</label>
                <input type="time" value="<?=$model['start_time']?>" name="start_time" id="start_time">

                <label for="end_time" class="form-label" style="margin-left: 15px;">Закінчується о:</label>
                <input type="time" value="<?=$model['end_time']?>" name="end_time" id="end_time">
            </div>
            <button type="submit" class="btn btn-dark text-white">Зберегти</button>
        </form>
        </div>
    </section>