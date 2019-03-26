<?php
 echo '
 <a  id="pokazkoszyk" href="index.php?page=koszyk&pokaz=zamowienie" class="btn btn-primary active btn-lg ml-4 mb-4" role="button" aria-pressed="true">POKAZ ZAMOWIENIE</a>

 <a  id="back" href="index.php" class="btn btn-primary active btn-lg ml-4 mt-4" role="button" aria-pressed="true">back</a>

 <div class="container"><div class="row products">';
 $sql = 'SELECT `id_produktu`,`nazwa_produktu`,`id_kategorii`,`cena_produktu`,`img_src` FROM `products` WHERE `id_kategorii`="'.$page.'" ';

$result = mysqli_query($connection,$sql);
while ($list = mysqli_fetch_assoc($result)) {
    $id_kategorii= mysqli_fetch_assoc(mysqli_query($connection, 'SELECT `kategoria` FROM `kategorie` WHERE `id_kategorii`="'.$list['id_kategorii'].'" '))['kategoria'];
        

echo '<div class="col-6 align-self-end"> 
        <a href="index.php?back='.$list['id_kategorii'].'&item=TRUE&page='.$list['id_produktu'].'">
            <img src="'.$list['img_src'].'">
            <h1>"'.$list['nazwa_produktu'].'"</h1>
        </a>
    </div>';
} echo '</div></div>';
?>
<!-- <button id="back" class="btn btn-primary btn-lg ml-4 mt-4" onclick="history.go(-1);">COFNIJ </button> -->
