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


    <section class="vh-100  mt-5 pt-5" style="background-color: #eee;">
    <div class="container h-80">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-5 p-3">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">

                    <p class="text-center h1 fw-bold mx-1 mx-md-4 mt-4">Увійти</p>
                    <p class="text-center mx-1 mx-md-4"><a href="http://tetatet/users/register" class="link">Створити аккаунт <b>тут</b>!</a></p>
                    <form class="mx-1 mx-md-4" method="post" action="">

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example1c" class="form-control" name="login" value="<?=$_POST['login']?>" id="exampleInputEmail1" placeholder="Ваша ел.пошта" required />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example1c" class="form-control" name="password" id="password1" placeholder="Пароль" required />
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Увійти</button>
                    </div>

                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    
<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<script src="/alien/ckeditor/ckeditor.js"></script>