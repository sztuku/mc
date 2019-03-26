<!doctype html>
<html lang="pl-PL">
<head>
   <meta charset="UTF-8">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="mc.css">
    <title>KONTROL </title>
  </head>
  <body style="background-color:#2c7100;">
  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>    

    <?php

session_start();
  
$connection = mysqli_connect('localhost', 'root') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'mcdonald') 
or die('Nie mogę połączyć się z bazą danych'); 


if(!isset($_POST['status']))
{

}else
{
    mysqli_query($connection,'UPDATE `orders` SET status=TRUE WHERE `id_zamowienia`='.$_POST['status'].'');

}


if(!isset($_POST['done']))
{

}else
{
    mysqli_query($connection,'UPDATE `orders` SET `status`=2 WHERE `id_zamowienia`='.$_POST['done'].'');

}




    ?>
<div class="row ">
    <div class="col-4 offset-2 win">
        <form action="control.php" method="POST">
            <input type="text" name="status" placeholder="podaj id: ">
            <button type="submit" class="btn btn-warning">GOTOWE DO ODBIORU</button>
        </form>
    </div>

    <div class="col-4 offset-1 win">
        <form action="control.php" method="POST">
            <input type="text" name="done" placeholder="podaj id: ">
            <button type="submit" class="btn btn-warning">ODEBRANE</button>
        </form>
    </div>
</div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
  </body>
</html>