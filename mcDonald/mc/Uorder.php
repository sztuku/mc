<?php




if(isset($_GET['order']) && $_GET['order']==TRUE)
{
    unset($_SESSION['suma']);
    unset($_SESSION['id_zamowienia']);
    header('location:index.php');
   exit();

}

    $_SESSION['suma']=0;


if(!isset($_SESSION['id_zamowienia']))
{
    header('location:index.php?error=TRUE');
}



if(isset($_GET['delId']))
        {
            mysqli_query($connection,'DELETE FROM `lista_zamowien`
             WHERE `id_produktu`='.$_GET['delId'].' AND `id_zamowienia` = '.$_SESSION['id_zamowienia'].'');
            unset($_GET['delId']);

        }

       


echo ' 
<a  id="back" href="index.php" class="btn btn-primary active btn-lg ml-4 mt-4" role="button" aria-pressed="true">back</a>
<form action="index.php?page=koszyk&pokaz=zamowienie&anuluj=TRUE.php" method="post">
<button  id="ANULUJ" class="btn btn-outline-danger">ANULUJ</button>
</form>
<a  id="back" href="index.php" class="btn btn-primary active btn-lg ml-4 mt-4" role="button" aria-pressed="true">back</a>';

$znajdz_id_produktu = mysqli_query($connection,'SELECT `id_produktu` 
FROM `lista_zamowien` 
WHERE `id_zamowienia`="'.$_SESSION['id_zamowienia'].'" ');

if(isset($_POST['ilosc']))
                {
                    mysqli_query($connection,'UPDATE `lista_zamowien` 
                    SET `ilosc`='.$_POST['ilosc'].' 
                    WHERE  `index`='.$_GET['index'].' ');
                    unset($_POST['ilosc']);

                }


echo '
<div class="container">
    <div class="row products">';


        


        while ($id_produktu = mysqli_fetch_assoc($znajdz_id_produktu)) 
        {
                
            
            


            $index = mysqli_fetch_assoc(mysqli_query($connection,'SELECT `ilosc`,`index` FROM `lista_zamowien` 
            WHERE `id_zamowienia`="'.$_SESSION['id_zamowienia'].'" AND `id_produktu`='.$id_produktu['id_produktu'].' '))['index'];

            $ilosc = mysqli_fetch_assoc(mysqli_query($connection,'SELECT `ilosc`,`index` FROM `lista_zamowien` 
            WHERE  `index`='.$index.' '))['ilosc'];
            

            $produkt = mysqli_query($connection, 'SELECT `id_produktu`,`nazwa_produktu`,`cena_produktu`,`img_src` 
                                                FROM `products` 
                                                WHERE `id_produktu`='.$id_produktu['id_produktu'].' ');
    
            while($znajd_produkt= mysqli_fetch_assoc($produkt))
            {

          
            echo '
            <div class="products col-4 align-self-end"> 

                        
                <img src="'.$znajd_produkt['img_src'].'">
               <h1>'.$znajd_produkt['nazwa_produktu'].'</h1><br/>
               <h1>'.$znajd_produkt['cena_produktu'].' zł</h1><br/>  
              
               <form id="zmienilosc" action="index.php?page=koszyk&pokaz=zamowienie&index='.$index.'" method="POST">
              <div class="zmien"> <input name="ilosc" class="h1 iloscrzeczy" value='.$ilosc.'></input></div><br/>
              <button type="sumbit" class="btn btn-success">zmien</button>
               </form>
               <a id="delorder" href="index.php?page=koszyk&pokaz=zamowienie&index='.$index.'&
               delId='.$znajd_produkt['id_produktu'].'" class="btn btn-danger">Usun</a>

               
                
            </div>';
            
            $_SESSION['suma']= $_SESSION['suma']+$ilosc*$znajd_produkt['cena_produktu'];
            }
            
           
        } 
echo '
    </div>
</div>
 
';



if(isset($_GET['anuluj']) && $_GET['anuluj']==TRUE)
{
    mysqli_query($connection,'DELETE FROM `orders` WHERE `id_zamowienia` = '.$_SESSION['id_zamowienia'].'') ;

    while(mysqli_fetch_assoc(mysqli_query($connection,'SELECT `id_zamowienia` 
    FROM `lista_zamowien` WHERE `id_zamowienia` = '.$_SESSION['id_zamowienia'].' ')))
    {
        mysqli_query($connection,'DELETE FROM `lista_zamowien` WHERE `id_zamowienia` = '.$_SESSION['id_zamowienia'].' ');
    }
    unset($_SESSION['id_zamowienia']);
    unset($_GET['anuluj']);
    header('location:index.php');



}

if(mysqli_fetch_object(mysqli_query($connection, 'SELECT count(*) c FROM `lista_zamowien`
 WHERE `id_zamowienia`= '.$_SESSION['id_zamowienia'].''))->c==0)
{
    header('location:index.php?error=TRUE');
}

echo '
<form id="suma" action="index.php?page=koszyk&pokaz=zamowienie&order=TRUE" method="post">

<div class="input-group mb-3">
  <div class="input-group-prepend">
  <button  id="order" type="submit" class="btn btn-outline-success">ZAMOW</button>
  </div>
  <input class="form-control" id="sumabtm" placeholder='.$_SESSION['suma'].'zł'.' disabled>

</div>
</form> 


';

echo'<script src="mc/Uorder.js"></script>';
?>