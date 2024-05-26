<?php
    require ('mysqlbaglan.php'); 
    
    // eger ki admin kullanici silme tusuna basarsa silecegi kullanicinin kullanici_id'si $_GET ile alinir.
    $id=$_GET['id'];
    // veritabanindan sql sorgusu ile silinir.
    $sql = "DELETE FROM kullanicilar WHERE kullanici_id='".$id."'";

    // sql sorgusu duzgun calisti mi diye kontrol eder.
    if (mysqli_query($baglanti, $sql) === TRUE) {
        header("Location: kullanicilar.php");
     } else {
         echo "Error deleting record: " . $baglanti->error;
     }

    $baglanti->close();
?>