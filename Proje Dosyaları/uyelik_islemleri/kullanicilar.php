<?php

    require('mysqlbaglan.php');

    // oturumu baslatir.
    session_start();

    // kullanici admin mi diye kontrol eder degilse ana sayfaya yonlendirir.
    if ($_SESSION['username'] != "admin") 
    { 
        header("Location: ../index.php"); 
        exit(); 
    } 

    // butun kullanicilari veri tabanindan ceker.
    $result = $baglanti->query('SELECT * from kullanicilar');
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }
    
    //kullanicilari bir tablo olarak ekrana yazdirir.
    //tablonun sutun adlari
    echo '<row class="row text-center justify-content-center align-items-center mx-2" style="margin-top: 100px">
    <table class="table table-dark table-bordered table-hover text-light my-4 table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">Kullanıcı Numarası</th> 
                <th scope="col">Kullanıcı Adı</th> 
                <th scope="col">Kullanıcı E-Postası</th>
                <th scope="col">Kullanıcıyı Sil</th>
            </tr>
        </thead>
    <tbody>'; 
    //tablonun degerleri
    while($row = mysqli_fetch_array($result)){ //veri tabanindan cekilen kullanicilar bitene kadar while dongusu calisir.
        $id = $row['kullanici_id'];
        echo "<tr>
                <td> " . $row['kullanici_id'] . "</td>
                <td> " . $row['kullaniciadi']. "</td>
                <td> " . $row['eposta'] . "</td>
                <td> <a class='btn btn-danger' href='kullanicisil.php?id=".$row['kullanici_id']."'>Delete</a> </td>
            </tr>"; 
    }
    echo "</tbody></table></row>";
    
?>

<!-- navbar ve bize ulasin kisimlarinin kodlari. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcılar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
    <b>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary border border-light fixed-top" style="font-size: 20px">
        <a class="navbar-brand" href="../index.php">
        <img src="../images/logoBW.jpg" width="70" height="70">
        </a>
        <a class="navbar-brand" href="../index.php" style="font-size: 30px">
        QuickRead Manga
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="../index.php">Ana Sayfa</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="../uyelik_islemleri/register.php">Kaydol</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="../uyelik_islemleri/login.php">Giriş Yap</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="../uyelik_islemleri/uyesayfasi.php">Profil</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="../manga_islemleri/mangalar.php">Mangalar</a>
            </li>
        </ul>
        </div>
    </nav>

    <div class="row bg-secondary text-light text-center justify-content-center fixed-bottom pb-4 pt-2" style="font-size: 17px">
        <div class="col-12 mb-2">
        <h5>Bize Ulaşın</h5>
        </div>
        <div class="col-4">
        <p class="nav-link bg-dark mx-2 rounded-lg border border-light">Telefon: +90 551-111-11-11</p>
        </div>
        <div class="col-4">
        <a class="nav-link bg-dark mx-2 rounded-lg border border-light text-light" href="https://github.com/MustafaAykut77/web-tabanli-programlama-bootstrap-proje">GitHub</a>
        </div>
        <div class="col-4">
        <p class="nav-link bg-dark mx-2 rounded-lg border border-light">E-Posta: mustafaykut77@gmail.com</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" 
        crossorigin="anonymous"></script>
</body>
</html>

