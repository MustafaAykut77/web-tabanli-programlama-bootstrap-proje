<!-- surekli olarak ayni islemler tekrar edilmemesi icin mysql'e baglanmak icin olusturulan dosya. -->
<?php 
    $server = 'localhost'; 
    $user = 'root'; 
    $password = ''; 
    $database = 'web_tabanli_programlama_proje_odevi'; 
    $baglanti = mysqli_connect($server,$user,$password,$database); 
    
    if (!$baglanti){ 
        echo "MySQL sunucu ile baglanti kurulamadi! </br>"; 
        echo "HATA: " . mysqli_connect_error(); 
        exit; 
    } 
?>