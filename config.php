<?php

$dblocation="localhost";
$dbname="prof";
$dbuser="root";
$dbpasswd="root";
global $dbcnx;
$dbcnx=mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname);
if (!$dbcnx) 
{
  echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому 
            корректное отображение страницы невозможно.</P>" );
  exit();
};
  mysqli_select_db ($dbcnx, $dbname);
?>