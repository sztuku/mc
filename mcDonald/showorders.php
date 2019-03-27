<!doctype html>
<html lang="pl-PL">
<head>
   <meta charset="UTF-8">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="mc.css">
    <title>zamowienia </title>
  </head>
  <body style="    background-color: #73da52;">
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


$inprogressql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=0 ');
$odebranesql=mysqli_query($connection,'SELECT `id_zamowienia` FROM `orders` WHERE `status`=1 ');


  echo'
<div class="row ">
    <div class=" text-center col-6">
    <h1>W TRAKCIE: <br/></h1>
    <ul class="inprogres">
    </ul>';
         
    // while($inprogres=mysqli_fetch_assoc($inprogressql))
    // {
    //     echo $inprogres['id_zamowienia'].'<br/>';
    // }




    echo '</div>

    <div class=" text-center col-6">
    <h1>DO ODBIORU: <br/></h1>
    <ul class="odbior">
    </ul>';


    // while($odebrane=mysqli_fetch_assoc($odebranesql))
    // {
    //     echo $odebrane['id_zamowienia'].'<br/>';
    // }

    echo'
    </div>
</div>';

  ?>
  <script>

// setTimeout(function () {
       
//   var complete = '';
//   var inprogres = '';
//         $.ajax({
//             type: "GET",
//             url: "show.php",
//             async: false,
//             success: function(text) {
//                 complete = text;
//             }
//         });
//         $.ajax({
//             type: "GET",
//             url: "robione.php",
//             async: false,
//             success: function(text) {
//                 inprogres = text;
//             }
//         });
//         $(".odbior").append(complete);
//         $(".inprogres").append(inprogres);
        
       


//     }, 10);

//     (function poll() {

//    setTimeout(function() {
      
//   var complete = '';
//   var inprogres = '';
//         $.ajax({
//                   type: "GET",
//                   url: "robione.php",
                  
//                   success: function(text) {
//                       inprogres = text;
                     
//             }, dataType: "json", complete: poll });

//        $.ajax({
//         type: "GET",
//             url: "show.php",
            
//             success: function(text) {
//                 complete = text;
               
//        }, dataType: "json", complete: poll });


//        $(".odbior").append(complete);
//         $(".inprogres").append(inprogres);
        
//     }, 3000);
// })();

function poll() {
   setTimeout(function() {
      
       $.ajax({ url: "show.php",dataType:"json", success: function(data) {

       
         
         
            $(".odbior").html(data.odbior);
         
         
            $(".inprogres").html(data.progres);
       
            
            
        

        
       poll();
       },});
       
    }, 50);
};
poll();


// function poll1() {
//    setTimeout(function() {
//        $.ajax({ url: "robione.php", success: function(data) {
//         $(".inprogres").html('<li>'+data+'</li>');
//         poll1();
                     
//        }, /* complete: poll1 */});

       
//     }, 3000);
// };
// poll1();

</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
  </body>
</html>