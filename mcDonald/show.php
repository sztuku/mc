<?php

session_start();
  
$connection = mysqli_connect('localhost', 'root') 
or die('Brak połączenia z serwerem MySQL'); 
$db = mysqli_select_db( $connection , 'mcdonald') 
or die('Nie mogę połączyć się z bazą danych'); 


$inprogressql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=0 ');
$odebranesql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=1 ');


$myObj=new \stdClass();

    while($odebrane=mysqli_fetch_assoc($odebranesql))
    {
        
        $myObj->odbior[] = '<li>'.$odebrane['id_zamowienia'].'</li>';
       
        

    }




    while($inprogres=mysqli_fetch_assoc($inprogressql))
    {
        $myObj->progres[] = '<li>'.$inprogres['id_zamowienia'].'</li>';
        

    }


    $myJSON = json_encode($myObj);
    echo $myJSON;
sleep(2);
  ?>