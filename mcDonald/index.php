<!doctype html>
<html lang="pl-PL">
<head>
   <meta charset="UTF-8">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="mc.css">
    <title>Zamowienia </title>
  </head>
  <body>
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



if(isset($_GET['error']))
{
  if( $_GET['error']==TRUE)
  {
  echo '
  <script type="text/javascript">

  alert("Nic nie zamówiłeś!");

</script>
  ';
 
 
  }
}

    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }else{$page='home';}
    
    if(!isset($page) || $page=='home' )
    {
       include('mc/menu.php');
    }else
    {

        if(isset($_GET['pokaz']) && $_GET['pokaz']=='zamowienie')
        {
            include('mc/Uorder.php');

        }else
        {

            if(!isset($_GET['item']))
            {
                include('mc/podmenu.php');
            }else
                {
                    include('mc/product.php');
                }
        }

    }

   




    ?>












    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
  </body>
</html>