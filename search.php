<?php
   require_once "functions.php";

   $findme = " ";
   $position = strpos ($_POST["name"], $findme);

   if ($position === false) {
   	$name [0] = $_POST["name"];
   	$name [1] = " ";
   	$name [2] = " ";
   }
   else {
   $name = explode(" ", $_POST["name"]);
    };


   $result = search1($name);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>поиск</title>
    <script type="text/javascript" nonce="821383e907094ce7869ee461a0d" src="//local.adguard.org?ts=1611941394567&amp;type=content-script&amp;dmn=cdn.discordapp.com&amp;app=chrome.exe&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0"></script>
    <script type="text/javascript" nonce="821383e907094ce7869ee461a0d" src="//local.adguard.org?ts=1611941394567&amp;name=AdGuard%20Popup%20Blocker&amp;name=AdGuard%20Extra&amp;type=user-script"></script><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="./css/style.css" rel="stylesheet" />
</head>
  <body>
    <header class="row bg-primary text-white m-0 d-flex align-items-center justify-content-center fixed-top">
      <div class="col-12 col-md-4 d-flex justify-content-between justify-content-md-start my-2">
        <nav class="navbar-expand-md">
          <button type="button" class="navbar-toggler" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <img src="./img/icons8-menu.svg">
          </button>
        </nav>
        <a class="navbar-brand text-white m-0 title" href="index.php">ОЦЕНИПРЕПОДА</a>
        <nav class="navbar-expand-md">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Searchbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <img src="./img/icons8-search.svg">
          </button>           
        </nav>
      </div>
      <nav class="navbar-expand-md d-flex col-12 col-md-4">
        <div class="collapse navbar-collapse my-2" id="Searchbar">
          <input class="form-control form-search" type="search" placeholder="Поиск" aria-label="Search">
        </div>
      </nav>
      <nav class="navbar-expand-md d-flex col-12 col-md-4">
        <div class="collapse navbar-collapse justify-content-end my-2" id="Auth">
          <button class="btn btn-primary mx-2" type="button">ВХОД</button>
          <button class="btn btn-primary" type="button">РЕГИСТРАЦИЯ</button>
        </div>
      </nav>        
    </header>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Приветствуем!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center">
              <button class="btn btn-primary mx-1" type="button">ВХОД</button>
              <button class="btn btn-primary mx-1" type="button">РЕГИСТРАЦИЯ</button>   
          </div>
        </div>
      </div>
    </div>
    <div class="margintop2"></div>
    <?php
    for ($i=0; $i<count($result); $i++)
   {
   	echo '
   	<section class="row m-0 mt-3  d-flex justify-content-center">
      <div class="col-12 col-lg-6">
        <div class="row p-2 bg-light d-flex justify-content-center">
          <a class="text fs-4 text-body" href="article.php?id='.$result[$i]["id"].'">'.$result[$i]["name1"].' '.$result[$i]["name2"].' '.$result[$i]["name3"].'</a>
        </div>      
      </div>
    </section>';
   }
   if (count($result)==0){
   	echo '
   	<section class="row m-0 mt-3  d-flex justify-content-center">
      <div class="col-12 col-lg-6">
        <div class="row p-2 d-flex justify-content-center">
   	    <p class="fs-4 text-center">Не найдено</p>
   	  </div>
   	</section>';
   }
   ?>
   
    <footer class="row bg-primary m-0 p-2 text-white d-flex justify-content-center fixed-bottom">
        <div class="col-12 col-lg-9">
            <p class="card-text mx-3">Инфо: все права защищены</p>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>