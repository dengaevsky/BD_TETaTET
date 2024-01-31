<?php
$connection = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  $userModel = new \models\Users();
  $user  = $userModel->GetCurrentUser();
  
  $all_messages = mysqli_query($connection, "SELECT * FROM messages");
  
	function actionAdd()
	{
    //Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
    $connect = mysqli_connect('127.0.0.1:3306','root','','tetatet');

    //Создаем переменные со значениями, которые были получены с $_POST
    $message = $_POST['message'];
    $datetime = date('Y-m-d H:i:s');
    $userModel = new \models\Users();
    $user  = $userModel->GetCurrentUser();
    $user_id = $user['id'];

    //Делаем запрос на добавление новой строки в таблицу
    mysqli_query($connect,"INSERT INTO `messages` (`id`, `message`, `datetime`, `user_id`) VALUES (NULL, '$message', '$datetime', '$user_id')");

    //Переадресация на страницу чата
    header('Location: /chat');
  }

    // function actionDelete($id)
  // {
  //   //Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
  //   $connect = mysqli_connect('127.0.0.1:3306','root','','tetatet');

  //   //Делаем запрос на удаление строки из таблицы
  //   mysqli_query($connect, "DELETE FROM `messages` WHERE `messages`.`id` = '$id'");

  //   //Переадресация на страницу
  //   @header("Location: /messages"]); // редирект
  //   exit(); // если нужно прервать скрипт
  // }

?>

<div style="background-color: #f2f2f2; min-height: 1100px;" class="d-flex flex-column">
  <div class="container" data-aos="fade-up">
  <section class="mt-5 pt-5">
    <div class="row">
      <div class="col-lg-12 text-center mb-5">
        <h2 class="page-title">Чат користувачів</h2>

        <section style="background-color: #f2f2f2;">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-12">
            <div class="card text-black">
            <div class="card-body">
                <div class="col-md-12 divScroll">

                    <nav id="navbar s3" class="navbar s3">
                    <form method="post" action="">
                      <?php 
                        $all_messages;
                        while ($message = mysqli_fetch_assoc($all_messages)){

                          $id_user  = $userModel->GetUserById($message['user_id']);?>

                            <!--IF ADMIN OR EDITOR(DELETE) -->
                            <!-- <?// if($message['user_id'] == $user['id'] || $user['role'] == 1) {?>
                              <div class="d-flex flex-row align-items-center">
                              <ul>
                                <li>
                                  <li><b><//     $id_user['firstname']    ;     id_user['lastname']     :</b></li>
                                  <li class="dropdown"><a><span>//      $message['message']      </span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                  <ul>
                                    <li><input type="submit" name="delete" value="Видалити" class="btn p-1 px-5 btn-primary border-0 bg-transparent text-dark"></input></li>
                                    <?
                                     //if($_POST['delete'] == true){ обработчик инпута
                                       //actionDelete($message['id']);
                                     //}
                                    ?>
                                  </ul>
                                </li>
                              </ul>
                              </div> -->
                            
                            <!-- IF NOT ADMIN OR EDITOR-->
                            <!--<?// } else {?> -->
                              <div class="d-flex flex-row align-items-center">
                              <nav id="navbar s3" class="navbar s3">
                                <ul>
                                  <li>        
                                    <li><b><?=$id_user['firstname'];?> <?=$id_user['lastname']?> :</b></li>
                                    <li><a><span><?=$message['message']?></span></a></li>   
                                  </li>
                                <ul>
                            </nav>
                              </div>
                            <?// };?>

                        <? 
                          };
                        ?>
                  </form>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

      <?
      if ($userModel->IsAuth()){ ?>
      <!-- ======= Comments Form ======= -->
      <div class="row justify-content-center">

      <div class="col-lg-12">
      <h5 class="comment-title">Залишити коментар:</h5>
      <div class="row">

        <form method="post" action="">
          <div class="col-12 mb-3">
                <textarea type="text" name="message" value="Напишіть коментар" id="message" class="form-control" id="comment-message" placeholder="Введіть ваш коментар" required></textarea>
            </div>
            <div class="col-12 text-center"> 
                <input type="submit" name="submitt" class="btn btn-primary" value="Викласти коментар">
            </div>
            <?php 

              //$id_delete; переменная айди от удаления
              if($_POST['submitt'] == true){
                actionAdd();
              }
              // if($_POST['delete'] == true){ обработчик формы
              //   actionAdd();
              // }

            ?>
        </form>

      </div>
      <!-- </div> -->

      </div><!-- End Comments Form -->
      <? } else {?>
        <div class="row justify-content-center mt-2">

          <div class="col-lg-12">
          <h5 class="comment-title">Щоб залишити повідомлення, авторизуйтесь...</h5>
          </div>
        </div>
      <? }?>
    </div>
  </section>
  </div>
  </div>
