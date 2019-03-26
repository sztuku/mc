<?php   



echo '
<a  id="pokazkoszyk" href="index.php?page=koszyk&pokaz=zamowienie" class="btn btn-primary active btn-lg ml-4 mb-4" role="button" aria-pressed="true">POKAZ ZAMOWIENIE</a>

    <a  id="back" href="index.php?back='.$_GET['page'].'&page='.$_GET['back'].'" class="btn btn-primary active btn-lg ml-4 mt-4" role="button" aria-pressed="true">back</a>
<div id="cien"></div>

    <div class="container">
        <div class="row products">';
            $sql = 'SELECT `id_produktu`,`nazwa_produktu`,`cena_produktu`,`img_src` 
            FROM `products` 
            WHERE `Id_produktu`="'.$_GET['page'].'" ';

            $result = mysqli_query($connection,$sql);

            while ($list = mysqli_fetch_assoc($result)) {
            echo '
                <div class="col-4 offset-4 align-self-end">
                    <form id="produktyform" action="index.php?back='.$_GET['back'].'&item=TRUE&page='.$list['id_produktu'].'&set=TRUE" method="POST">
                        <img src="'.$list['img_src'].'">
                       <input class="h1" name="nazwa_produktu" value="'.$list['nazwa_produktu'].'" ></br>
                       <input class="h1" name="cena_produktu" value="CENA: '.$list['cena_produktu'].' zł" > </h1>
                       
                           
                        

                    </form>
                    <button "submit" id="buy" class="btn btn-outline-danger">Dodaj do koszyka</button>
                </div>';
} echo '
        </div>';

        if(isset($_GET['set'])&&$_GET['set']==TRUE)
        {
            if(!isset($_SESSION['id_zamowienia']))
            {
                mysqli_query($connection,'INSERT 
                INTO `orders` 
                SET  id_zamowienia=NULL, data=CURRENT_TIMESTAMP, status=FALSE  ');
                $_SESSION['id_zamowienia']=mysqli_insert_id($connection);

            }  
             if(mysqli_fetch_object(mysqli_query($connection,
                   'SELECT count(*)  c FROM `lista_zamowien` 
                   WHERE `id_zamowienia`='.$_SESSION['id_zamowienia'].' AND `id_produktu`='.$_GET['page'].' '))->c==0  )
                    {
                        if(isset($_POST['nazwa_produktu']) && isset($_POST['cena_produktu'])  )
                        {       

                        
                                        
                        mysqli_query($connection,'INSERT 
                        INTO `lista_zamowien` 
                        SET  `id_zamowienia`='.$_SESSION['id_zamowienia'].', `id_produktu`='.$_GET['page'].', `ilosc`='.$_POST['ilosc'].' ');
                                    
                        }
                        
                    }else
                    {

                        if(isset($_POST['nazwa_produktu']) && isset($_POST['cena_produktu'])  )
                        {       
                        
                            $ilosc= mysqli_fetch_assoc(mysqli_query($connection,'SELECT `ilosc` FROM `lista_zamowien`
                            WHERE `id_zamowienia`='.$_SESSION['id_zamowienia'].' AND `id_produktu`='.$_GET['page'].''))['ilosc'];
                                        echo $ilosc;


                            mysqli_query($connection,'UPDATE 
                            `lista_zamowien` 
                            SET   `ilosc`=('.$_POST['ilosc'].' + '.$ilosc.') WHERE `id_zamowienia`='.$_SESSION['id_zamowienia'].' AND `id_produktu`='.$_GET['page'].' ');
                                

                        }
                    }
                            

            }
        

          
        // unset($_SESSION["id_zamowienia"]);






        echo '
    </div> ';


  
       
        



echo '<script src="mc/productsilosc.js"> ';
?>