<?php

session_start();
  
$connection = mysqli_connect('localhost', 'root') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'mcdonald') 
or die('Nie mogę połączyć się z bazą danych'); 


$inprogressql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=0 ');
$odebranesql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=1 ');




    while($odebrane=mysqli_fetch_assoc($odebranesql))
    {
        echo $odebrane['id_zamowienia'].'<br/>';
    }

  ?>