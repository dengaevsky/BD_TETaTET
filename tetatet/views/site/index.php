<?php 
    $connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');
    $lastNews = mysqli_query($connection, "SELECT * FROM news");

    $all2_news = mysqli_query($connection, "SELECT * FROM news");
    $war_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%війна%'");
    $it_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%IT%'");
    $business_news = mysqli_query($connection, "SELECT * FROM news WHERE text LIKE '%бізнес%'");
    $last_news = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 5");
    $last_news2 = mysqli_query($connection, "SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 3");
?>
<main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">

              <?php
              foreach($last_news as $news):
              ?>
                <div class="swiper-slide">
                  <a href="/news/view?id=<?=$news['id'] ?>" class="img-bg d-flex align-items-end" style="background-image: url('files/news/<?=$news['photo'] ?>_b.jpg');">
                    <div class="img-bg-inner">
                      <h2><?=$news['title']?></h2>
                      <p><?=$news['description']?></p>
                    </div>
                  </a>
                </div>
              <?php endforeach;?>

              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Про нас</h1>
          </div>
        </div>

        <div class="row mb-5">

          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
            </a>
            <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Про нас</div>
              <h2 class="mb-4 display-4">Історія телеканалу</h2>
              <p>Наша ціль полягає в тому, щоб бути корисними для українського суспільства, саме тому ми, колись звичайні студенти жур.факу вирішили спробувати створити розробити власний новинний блог, який у майбутньому досить стрімко виріс у справжній телеканал!</p>
              <p>Наш досвід роботи, орієнтація на результат, відповідальність, чесність й відданість справі допомагають нам краще розуміти, що потрібно відвідувачам сайту й глядачам. Ми розробили для вас найкращий новинний ресурс й телеканал, який володіє найгарячішими новинами й висвітлює правду людям навкого.</p>
            </div>
          </div>

          <div class="d-md-flex post-entry-2 half mt-5">
            <a href="#" class="me-4 thumbnail order-2">
              <img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
            </a>
            <div class="pe-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Про нас</div>
              <h2 class="mb-4 display-4">Місія &amp; Бачення</h2>
              <p>Кожен з нас різний, має різні погляди, цінності та досвід, не завжди збігаються смаки, різняться думки, зустрічається як підтримка так і критика, але саме все це в сукупності дає нам можливість ставати краще й висвітлювати в першу чергу саму новину, а не нав'язувати глядачу думку про неї, створювати справді унікальні інсайди.</p>
              <p>Кожен день нашої роботи не схожий на попередній, тому що ставить перед нами нові цікаві та нестандартні завдання та можливості їх оперативного вирішення, породжує нові ідеї та способи їх втілення у реальність. Керуємося девізами: «Лови натхнення в кожній миті» та «Професіоналам під силу всім».</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section class="mb-5 bg-light py-5">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between align-items-lg-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <h2 class="display-4 mb-4">Останні новини</h2>
            <p>Ми креативний український та україномовний теле-ресурс, що привідкриває завісу таємничості над світом технологій як на теренах України, так і за її межами. Технології – це не лише ґігагерци та ядра. Це також нанороботи, штучний інтелект та розумні ґаджети.</p>
            <p>Тобто це майбутнє, яке на нас чекає і про яке ми так любимо розповідати вам. Ми не ангажовані жодним із виробників техніки, тому пишемо об’єктивні новини, авторські статті і огляди ґаджетів. Розкриваємо всі позитивні, а особливо негативні, сторони тих чи інших пристроїв. Намагаємось донести таку важливу інформацію швидко й доступно.</p>
            <p><a href="/news" class="more">Переглянути всі новини</a></p>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-6">
                <img src="assets/img/post-portrait-7.jpg" alt="" class="img-fluid mb-4">
              </div>
              <div class="col-6 mt-4">
                <img src="assets/img/post-portrait-8.jpg" alt="" class="img-fluid mb-4">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h2 class="display-4">Наша команда</h2>
                <p>Талановита команда професіоналів, об’єднана спільними цілями та цінностями. Кожен співробітник є важливою ланкою в загальній діяльності команди, сприяє її розвитку та успіху. Ми відповідаємо за свою роботу.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="assets/img/person-4.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Гаєвський Денис</h4>
            <span class="d-block mb-3 text-uppercase">Засновник</span>
            <p>займається технологічним розвитком сайту; відповідає за злагоджену роботу команди. Данило володіє десятками комунікативних здібностей, легко генерує креативні ідеї і завжди на «ти» з новими технологіями. Великий фанат інновацій, футболу, гарної музики та гарної компанії.</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="assets/img/person-5.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Олеся Гончаренко</h4>
            <span class="d-block mb-3 text-uppercase">Маркетолог &amp; SEO</span>
            <p>відповідає за розвиток сайту в Україні та комунікації з представництвами та клієнтами; відрізняється активною життєвою позицією та оптимізмом; вміє зі швидкістю світла знаходити спільну мову з новими людьми, незалежно від їхнього віку, статі та світогляду. Подобається хороша музика, мандрівки. Захоплюється садівництвом та різноманітними творчими заняттями</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="assets/img/person-3.jpg" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Ксенія Адамчук</h4>
            <span class="d-block mb-3 text-uppercase">Дизайнер</span>
            <p>відповідає за магію дизайну на нашому сайті, Ксенія розкриває красу зображень та дарує життя новим графічним матеріалам; саме з її легкої руки та творчого підходу оживають предмети на зображеннях, цвітуть фотогалереї та радують око презентації. Любить подорожувати, дізнаватися щось нове, спілкуватися з людьми та дивувати їх своєю творчістю</p>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
          <li><a href="/"><i class="bi bi-chevron-right"></i> Головна</a></li>
          <li><a href="/news"><i class="bi bi-chevron-right"></i> Новини</a></li>
          <li><a href="/teleprogram"><i class="bi bi-chevron-right"></i> Телепрограма</a></li>
          <li><a href="/chat"><i class="bi bi-chevron-right"></i> Чат</a></li>
          <li><a href="/contact"><i class="bi bi-chevron-right"></i> Контакти</a></li>
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