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

    <section class="mt-5 pt-5" style="min-height:800px;">>
        <div class="container">
            <h1 class="text-center">Заповнення</h1><br>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок:</label>
                <input type="text" name="title" value="<?=$model['title']?>" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Тема:</label>
                <select name="category" value="<?=$model['category']?>" class="form-control" id="category">
                    <option value="Спорт">Спорт</option>
                    <option value="Новини">Новини</option>
                    <option value="Наука">Наука</option>
                    <option value="Розваги">Розваги</option>
                    <option value="Релігія">Релігія</option>
                    <option value="Подорожі">Подорожі</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Короткий опис:</label>
                <textarea type="text" name="description" class="form-control" id="description"><?=$model['description']?></textarea>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Фотографія:</label>
                <input type="file" name="file" id="file" class="form-control" accept="image/jpeg, image/png">
            </div>
            <div class="mb-3">
                <? if (is_file('files/news/'.$model['photo'].'_s.jpg')) : ?>
                <label for="text" class="form-label">Поточна фотографія:</label>
                <img src="/files/news/<?=$model['photo'] ?>_s.jpg" />
                <? endif; ?>
            </div>
            <button type="submit" class="btn btn-dark text-white">Зберегти</button>
        </form>
        </div>
    </section>