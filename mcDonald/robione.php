<?php

session_start();
  
$connection = mysqli_connect('localhost', 'root') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'mcdonald') 
or die('Nie mogę połączyć się z bazą danych'); 

$inprogressql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=0 ');

while($inprogres=mysqli_fetch_assoc($inprogressql))
{
    echo '<li>'.$inprogres['id_zamowienia'].'<li/>';
}




  ?>