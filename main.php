<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оценипрепода</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
          <input class="form-control form-search" name="name" type="search" placeholder="Поиск" aria-label="Search">
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
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <section class="row mx-2 d-flex justify-content-center margintop">
        <div class="col-12 col-lg-8">
          <div class="row bg-primary text-white mb-5 d-flex justify-content-center">   
            <div class="col-11 col-sm-10 col-md-7 d-flex justify-content-center mt-4">
              <input class="form-control form-search fs-4 text-center" name="name" type="search" placeholder="ФИО преподователя" aria-label="Search">
            </div>
            <div class="col-7 d-flex justify-content-center my-3 mb-4">
              <button type="submit" name ="submit" class="btn btn-success fs-4 btn-lg text">Найти</button>
            </div>
          </div>
        </div>
      </section>
	</form>
    <section class="row m-2 d-flex justify-content-center">
      <div class="col-12 col-lg-9">
        <div class="my-5">
          <div class="row m-0">
            <div class="col d-flex justify-content-center my-2">
              <div class="card" style="width: 18rem;">
                <img src="./img/1.jpg" class="card-img-top" alt="urfu">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
            <div class="col d-flex justify-content-center my-2">
              <div class="card" style="width: 18rem;">
                <img src="./img/1.jpg" class="card-img-top" alt="urfu">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="row bg-primary m-0 p-2 text-white d-flex justify-content-center fixed-bottom">
        <div class="col-12 col-lg-9">
            <p class="card-text mx-3">Инфо: все права защищены</p>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>