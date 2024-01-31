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

    <section class="vh-100 pt-5 mt-5" style="background-color: #eee;">
    <div class="container">
        <br>
        <p>
                Ви дійсно бажаєте видалити <b><?=$model['title'] ?></b>?
            </p>
            <p>
                <a href="/teleprogram/delete?id=<?=$model['id']?>&confirm=yes" class="btn btn-outline-dark me-2">Видалити</a>
                <a href="/teleprogram/" class="btn btn-dark text-white">Відмінити</a> 
            </p>
        <br>
    </div>
    </section>