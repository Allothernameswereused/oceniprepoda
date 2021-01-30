<?php
   require_once"functions.php";

   if(isset($_POST['submit'])){
    //var_dump($_POST);
    $rate1=$_POST["rate1"]+1-1;
$rate2=$_POST["rate2"]+1-1;
$rate3=$_POST["rate3"]+1-1;
$rate4=$_POST["rate4"]+1-1;
$input = $_POST["message"];
$tag1=$tag2=$tag3=$tag4=$tag5=$tag6=$tag7=$tag8=0;
if ($_POST["tag1"]=="on") 
{
  $tag1=1;
};
if ($_POST["tag2"]=="on") 
{
  $tag2=1;
};
if ($_POST["tag3"]=="on") 
{
 $tag3=1;
};
if ($_POST["tag4"]=="on") 
{
 $tag4=1;
};
if ($_POST["tag5"]=="on") 
{
  $tag5=1;
};
if ($_POST["tag6"]=="on") 
{
  $tag6=1;
};
if ($_POST["tag7"]=="on") 
{
  $tag7=1;
};
if ($_POST["tag8"]=="on") 
{
  $tag8=1;
};

addComment($input, $_POST["pageid"],$rate1,$rate2,$rate3,$rate4,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8);




   }





   $newestid = $_GET["id"];
   $news=getNews(1,$newestid);
   $fullname = $news["name1"]." ".$news["name2"]." ".$news["name3"];
    $comments = getComments (5, $newestid);
     $sum1 = 0; $sum2 = 0; $sum3 = 0; $sum4 = 0; $amount=0;
     $count1=$count2=$count3=$count4=$count5=$count6=$count7=$count8=0;

     for ($i=0; $i<count($comments);$i++) 
     {
        if ( $comments[$i]["prepod"]==$_GET["id"])
        {
            $sum1 = $sum1+$comments[$i]["rate1"];
            $sum2 = $sum2+$comments[$i]["rate2"];
            $sum3 = $sum3+$comments[$i]["rate3"];
            $sum4 = $sum4+$comments[$i]["rate4"];

            $amount++;

            $count1=$count1+$comments[$i]["tag1"];
            $count2=$count2+$comments[$i]["tag2"];
            $count3=$count3+$comments[$i]["tag3"];
            $count4=$count4+$comments[$i]["tag4"];
            $count5=$count5+$comments[$i]["tag5"];
            $count6=$count6+$comments[$i]["tag6"];
            $count7=$count7+$comments[$i]["tag7"];
            $count8=$count8+$comments[$i]["tag8"];
       };
     };

    $sred1 = round($sum1/ $amount,1);
    $sred2 = round($sum2/ $amount,1);
    $sred3 = round($sum3/ $amount,1);
    $sred4 = round($sum4/ $amount,1);
    $maxtags=array();

    $tag_text = array ("Сложный экзамен","Скучные лекции","Мало домашки","Возможен автомат","Легкий экзамен","Интересные лекции","Много домашки","Важно посещать");
    
    $tags = array ($count1,$count2,$count3,$count4,$count5,$count6,$count7,$count8);
    sort($tags);

    $max1=$tags[5]; $max2 = $tags[6]; $max3=$tags[7];
    
    if(($count1==$max1) ||($count1==$max2)||($count1==$max3)) {array_push($maxtags,$tag_text[0]);};
    if(($count2==$max1) ||($count2==$max2)||($count2==$max3)) {array_push($maxtags,$tag_text[1]);};
    if(($count3==$max1) ||($count3==$max2)||($count3==$max3)) {array_push($maxtags,$tag_text[2]);};
    if(($count4==$max1) ||($count4==$max2)||($count4==$max3)) {array_push($maxtags,$tag_text[3]);};
    if(($count5==$max1) ||($count5==$max2)||($count5==$max3)) {array_push($maxtags,$tag_text[4]);};
    if(($count6==$max1) ||($count6==$max2)||($count6==$max3)) {array_push($maxtags,$tag_text[5]);};
    if(($count7==$max1) ||($count7==$max2)||($count7==$max3)) {array_push($maxtags,$tag_text[6]);};
    if(($count8==$max1) ||($count8==$max2)||($count8==$max3)) {array_push($maxtags,$tag_text[7]);};

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$fullname.'</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
    <section class="row mx-2 d-flex justify-content-center margintop2">
        <div class="col-12 col-lg-9">
            <div class="row bg-light text-dark px-3 py-4">
                <p class="text fs-2">'.$fullname.'</p>
                <div class="container mt-3 mb-5">
                    <div class="row row-cols-xl-4 row-cols-2" >
                        <div class="col-lg-3 d-flex justify-content-center">
                            <div class="row">
                                <div class="col-12 text-center m-0 nom">'. $sred1.'</div>
                                <div class="col-12 fs-5 text text-center m-0">Актуальность</div>
                            </div>
                        </div>
                        <div class="col col-lg-3 d-flex justify-content-center">
                            <div class="row">
                                <div class="col-12 text-center m-0 nom">'. $sred2.'</div>
                                <div class="col-12 fs-5 text text-center m-0">Подача</div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center">
                            <div class="row">
                                <div class="col-12 text-center m-0 nom">'. $sred3.'</div>
                                <div class="col-12 fs-5 text text-center m-0">Отношение</div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-center">
                            <div class="row">
                                <div class="col-12 text-center m-0 nom">'.$sred4.'</div>
                                <div class="col-12 fs-5 text text-center m-0">Сложность</div>
                            </div>
                        </div>
                    </div>
                </div>
            
           <div class="container">
                    <div class="d-flex tag" >
                        <input type="checkbox" class="btn-check" id="btn-check-1-outlined" autocomplete="off">
                        <label class="btn btn-outline-primary m-1" for="btn-check-1-outlined">'.$maxtags[0].'</label>
                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined" autocomplete="off">
                        <label class="btn btn-outline-primary m-1" for="btn-check-2-outlined">'.$maxtags[1].'</label>
                        <input type="checkbox" class="btn-check" id="btn-check-3-outlined" autocomplete="off">
                        <label class="btn btn-outline-primary m-1" for="btn-check-3-outlined">'.$maxtags[2].'</label>
                
          </div>
                </div>
            </div>        
        </div>               
    </section>
    <section class="row m-2 d-flex justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="row p-1 p-md-4">
                <div class="col-12">
                    <button type="button" class="btn btn-success fs-4 btn-lg text" data-bs-toggle="modal" data-bs-target="#Form">
                        Оставить отзыв
                    </button>
                </div>
            </div>
        </div>
    </section>

     <!-- Modal -->
  <div class="modal fade" id="Form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ваш отзыв</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
         <form method="POST" action="">
         <input type="hidden" name="pageid" value="'.
     $newestid.'">
        <div class="modal-body">
            <div class="row d-flex align-items-start m-2">
                <div class="col-12 col-md-4 mt-2">        
                    <div class="row row-cols-md-1 row-cols-2  d-flex justify-content-center">
                        <div class="col fs-5 m-0 text d-flex flex-column">
                            <p class="mb-1">Актуальность</p>
                            <select class="form-number form-control mx-2" name="rate1"  id="exampleFormControlSelect1">
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                            </select>
                        </div>
                        <div class="col fs-5 text mt-1 d-flex flex-column">
                            <p class="mb-1">Подача</p>
                            <select class="form-number form-control mx-2" name="rate2"  id="exampleFormControlSelect1">
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                           </select> 
                        </div>               
                        <div class="col fs-5 text mt-1 d-flex flex-column">
                            <p class="mb-1">Отношение</p>
                            <select class="form-number form-control mx-2" name="rate3"  id="exampleFormControlSelect1">
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                            </select>    
                        </div>    
                        <div class="col fs-5 text mt-1 d-flex flex-column">
                            <p class="mb-1">Сложность</p>
                            <select class="form-number form-control mx-2" name="rate4"  id="exampleFormControlSelect1">
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                            </select> 
                        </div> 
                    </div>        
                </div>
                <div class="col-12 col-md-8 mt-2">
                    <div class="form-group text fs-5">
                        <label for="exampleFormControlTextarea1 ">Введите отзыв:</label>
                        <textarea class="form-control form-text"  name="message"  id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                </div>        
                <div class="container mt-3">
                    <div class="d-flex tag" >
                        <input type="checkbox" class="btn-check" name="tag1" id="btn-check-1" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-1">Сложный экзамен</label>
                        <input type="checkbox" class="btn-check" name="tag2"  id="btn-check-2" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-2">Скучные лекции</label>
                        <input type="checkbox" class="btn-check" name="tag3"  id="btn-check-3" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-3">Мало домашки</label>
                        <input type="checkbox" class="btn-check" name="tag4"  id="btn-check-4" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-4">Возможен автомат</label>
                        <input type="checkbox" class="btn-check" name="tag5"  id="btn-check-5" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-5">Легкий экзамен</label>
                        <input type="checkbox" class="btn-check" name="tag6"  id="btn-check-6" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-6">Интересные лекции</label>
                        <input type="checkbox" class="btn-check" name="tag7"  id="btn-check-7" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-7">Много домашки</label>
                        <input type="checkbox" class="btn-check" name="tag8"  id="btn-check-8" autocomplete="off">
                        <label class="btn btn-outline-primary btn-form m-1" for="btn-check-8">Важно посещать</label>
                    </div>
                </div>        
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal -->


        ';

        for ($i=0; $i<count($comments);$i++) 
        {
            $commenttags = array();
            if ($comments[$i]["tag1"]==1){array_push($commenttags,$tag_text[0]);};
            if ($comments[$i]["tag2"]==1){array_push($commenttags,$tag_text[1]);};
            if ($comments[$i]["tag3"]==1){array_push($commenttags,$tag_text[2]);};
            if ($comments[$i]["tag4"]==1){array_push($commenttags,$tag_text[3]);};
            if ($comments[$i]["tag5"]==1){array_push($commenttags,$tag_text[4]);};
            echo'    <section class="row m-2 d-flex justify-content-center">
        <div class="col-12 col-lg-9">
            <div class="row bg-light text-dark  my-5 px-3 py-4">
                <p class="text fs-2 mb-4"></p>
                <div class="row">
                    <div class="col- col-md-4 mb-3">
                        <p class="text fs-5 fs-sm-5 mb-0">Подача информации</p>
                        <p class="text fs-5">'.$comments[$i]["rate1"].'</p>
                        <p class="text fs-5 fs-sm-5 mb-0">Отношение к студентам</p>
                        <p class="text fs-5">'.$comments[$i]["rate2"].'</p>
                        <p class="text fs-5 fs-sm-5 mb-0">Сложность</p>
                        <p class="text fs-5">'.$comments[$i]["rate3"].'</p>
                        <p class="text fs-5 fs-sm-5 mb-0">Объём д/з</p>
                        <p class="text fs-5">'.$comments[$i]["rate4"].'</p>
                    </div>
                    <div class="col- col-md-8 mb-3">
                        <p class="text fs-5 ">'.$comments[$i]["text"].'</p>
                    </div>
                    <div class="container">
                        <div class="d-flex tag">              
            '
            ;
            for ($d=0; $d<count($commenttags);$d++) 
            {
                echo '
                        <p class="tag-gray text fs-6 btn-sm text-nowrap">'.$commenttags[$d].'</p>';
            };
            echo '
              </div>
                        </div>
                    </div>    
                </div>
            </div>
    </section>

            ';
        };

    echo '

    <footer class="row bg-primary m-0 p-2 text-white d-flex justify-content-center fixed-bottom">
        <div class="col-12 col-lg-9">
            <p class="card-text mx-3">Инфо: все права защищены</p>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>';?>