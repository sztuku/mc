<?php
 echo '
 <a  id="pokazkoszyk" href="index.php?page=koszyk&pokaz=zamowienie" class="btn btn-primary active btn-lg ml-4 mb-4" role="button" aria-pressed="true">POKAZ ZAMOWIENIE</a>

 <div class="container">

        <div class="row products">';
        $id_kategoriisql=mysqli_query($connection, 'SELECT `id_kategorii`,`kategoria`  FROM `kategorie`');

while ( $id_kategorii = mysqli_fetch_assoc($id_kategoriisql)) {
    $srcsql=mysqli_query($connection, 'SELECT `img_src`  FROM `products` WHERE `id_kategorii`="'.$id_kategorii['id_kategorii'].'" ');             
      $src=mysqli_fetch_assoc($srcsql);
    echo '
    <div class="col-6 align-self-end">
    
    <a href="index.php?page='.$id_kategorii['id_kategorii'].'&back='.$id_kategorii['id_kategorii'].'">
    <img src="'.$src['img_src'].'">
    <h1>'.$id_kategorii['kategoria'].'</h1>
    </a>
    
        </div>';

        }



        echo '</div> </div>'; 
        
        
        
        

?>