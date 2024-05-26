<?php
    require ('mysqlbaglan.php'); 
    
    $id=$_GET['id']; //admin manga sil tusuna basarsa silecegi manganin manga_id'si bu php sayfasina paslanir.
    echo $id;
    $sql = "DELETE FROM mangalar WHERE manga_id='".$id."'"; //sql sorgusu ile veri tabanindan silinir.

    if (mysqli_query($baglanti, $sql) === TRUE) { //silme islemi basarili mi degil mi diye kontrol eder.
        header("Location: mangalaradmin.php");
     } else {
         echo "Error deleting record: " . $baglanti->error;
     }

    $baglanti->close();

?>