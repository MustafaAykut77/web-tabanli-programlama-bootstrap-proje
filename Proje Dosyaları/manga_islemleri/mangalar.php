<?php

    require('mysqlbaglan.php');

    //sql sorgusu ile butun mangalari veri tabanindan ceker.
    $result = $baglanti->query('SELECT * from mangalar');
    if (!$result) {
        die('Invalid query: ' . mysql_error());
    }

    //ilk echo ile tablonun sutun basliklarini yazdirir.
    echo '<row class="row text-center justify-content-center align-items-center mx-2" style="margin-top: 100px">
    <table class="table table-dark table-bordered table-hover text-light my-4 table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">Manga Numarası</th>
                <th scope="col">Manga Adı</th>
                <th scope="col">Manga Türü</th>
                <th scope="col">Puanlama</th>
                <th scope="col">Yayınlanma Yılı</th>
                <th scope="col">Bitme Durumu</th>
            </tr>
        </thead>
    <tbody>';

    //while dongusu ile veri tabanindan cekilen veri bitene kadar mangalari ekrana yazdirir. 
    //mangalaradmin'den farki kullanici manga silemez bu yuzden silme tusunu olusturmaz.
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
                <td> " . $row['manga_id'] . "</td>
                <td> " . $row['ad']. "</td>
                <td> " . $row['tur'] . "</td>
                <td> " . $row['puanlama'] . "</td>
                <td> " . $row['yayinlanma_yili'] . "</td>
                <td> " . $row['bitti'] . "</td>
            </tr>"; 
    }
    echo "</tbody></table></row>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangalar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
    <b>
    <!-- navbar baslangici -->
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
    <!-- navbar bitisi -->

    <!-- bize ulasin baslangici -->
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
    <!-- bize ulasin bitisi -->
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

