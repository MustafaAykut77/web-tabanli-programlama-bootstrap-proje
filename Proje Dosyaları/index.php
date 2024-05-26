<!-- Ana sayfada kullanici girisi var mi yok mu kontrolu icin eklendi -->
<?php session_start(); ?>

<!-- Bootstrap siniflariyla olusturulmus ana sayfa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickRead Manga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">   
</head>

<body class="bg-dark">

    <!-- navbar baslangici -->
    <b><nav class="navbar navbar-expand-lg navbar-dark bg-secondary border border-light" style="font-size: 20px">
        <a class="navbar-brand" href="./index.php">
            <img src="./images/logoBW.jpg" width="70" height="70">  <!-- sol ustteki site logosu -->
        </a>
        <a class="navbar-brand" href="./index.php" style="font-size: 30px">
            QuickRead Manga <!-- logonun yanindaki site ismi -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- navbar ile yapilmis menu itemleri -->
                <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="./index.php">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="./uyelik_islemleri/register.php">Kaydol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="./uyelik_islemleri/login.php">Giriş Yap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="./uyelik_islemleri/uyesayfasi.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-dark mx-2 rounded-lg border border-light" href="./manga_islemleri/mangalar.php">Mangalar</a>
                </li>
            </ul>
        </div>
    </nav></b>
    <!-- navbar bitisi -->

    <!-- sayfanin ortasindaki 3-6-3 seklinde kolonlara ayrilmis satir baslangici -->
    <div class="row bg-secondary justify-content-center mt-3 mx-2" style="font-size: 17px">

        <!-- sol kolon -->
        <div class="col-md-3 col-sm-12 border border-light">
            <h5 class="text-center"><br>Manga nedir?</h5><hr> <!-- manga tanimi -->
            <p>Manga (Japonca: 漫画, マンガ), Japonya'ya özgü çizim sanatıyla çizilen çizgi romanlardır. 
            Japonya'da Manga sözcüğü tüm çizgi romanlar için kullanılırken, Japonya dışında sadece Japon çizgi romanları için kullanılır. 
            Manga stilinde yapılan animasyonlar anime olarak adlandırılır. Çizimler animeye göre daha abartılıdır. 
            Manga kelimesinin bilinen ilk kullanımı 1770'li yıllara dayanmaktadır. 
            19. yüzyıl boyunca kelime özel olarak, üzerinde karikatürler bulunan ağaç bloklarını, 
            özellikle de Hokusai Katsushika'nın 1819'da yayınlanmış olan ve öğrencilerinin kullanması için kendisinin çizdiği taslak, 
            çizim ve karikatürlerini adlandırmakta kullanılmıştır. 
            Hokusai çizdiği taslakları iki Kanji "漫 man" (kaygısız, ilgisiz) ve "画 ga" (resim) birleşiminden oluşan Manga kelimesiyle tanımlamıştır. 
            Kanji yerine Katakana alfabesinde マンガ olarak da yazılır.</p>
        </div>

        <!-- ortadaki kolon -->
        <div class="col-md-6 col-sm-12 border border-light">
        <h5 class="text-center"><br>Popüler mangalar</h5><hr>
            <!-- carousel ile kaymali bir sekilde gorsel konmustur. -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display: flex; text-align: center; justify-content: center; align-items: center;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- carousel itemleri -->
                        <a href="./manga_islemleri/mangalar.php"><img src="./images/jujutsukaisen.jpg" width='320'></a>
                    </div>
                    <div class="carousel-item">
                        <a href="./manga_islemleri/mangalar.php"><img src="./images/chainsawman.jpg" width='320'></a>
                    </div>
                    <div class="carousel-item">
                        <a href="./manga_islemleri/mangalar.php"><img src="./images/attackontitan.jpg" width='320'></a>
                    </div>
                </div>
                <!-- carousel tuslari -->
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>

        <!-- sagdaki kolon -->
        <div class="col-md-3 col-sm-12 border border-light">
            <!-- php sayesinde kullanici giris yaptiktan sonra ana sayfaya girdiyse hos geldin mesaji ile sagda bir card olusturulur. -->
            <?php
                if(!empty($_SESSION['username'])){
                    echo
                    '<div class="card mx-auto mt-5 bg-dark text-light border border-light" style="width: 18rem;">
                        <img src="./images/logoBW.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Hoş geldin '. '<b class="text-info">' . $_SESSION['username'] . '</b>' .'</h5>
                        <p class="card-text">Sağ üstteki menülerden siteyi keşfetmeye başlayabilirsin!</p>
                        <a href="./uyelik_islemleri/uyesayfasi.php" class="btn btn-info btn-block">Profiliniz</a>
                        </div>
                    </div>';         
                }
                // kullanici giris yapmadiysa kullaniciyi giris yapmaya veya kaydolmaya tesvik eder.
                else{
                    echo
                    '<div class="card mx-auto mt-5 bg-dark text-light border border-light" style="width: 18rem;">
                        <img src="./images/logoBW.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title text-center">Görünen o ki henüz giriş yapmamışsın!<br></h5>
                        <p class="card-text text-center">Hemen aşağıdan kaydol veya giriş yap.</p>
                            <div class="row text-center justify-content-center">
                            <a href="./uyelik_islemleri/login.php" class="btn btn-success col-4 mr-3">Giriş Yap</a>
                            <a href="./uyelik_islemleri/register.php" class="btn btn-info col-4">Kaydol</a>
                            </div>
                        </div>
                    </div>';  
                }
            ?>
        </div>
    </div>
    <!-- sayfanin orta kisminin bitisi -->

    <!-- Bize Ulasin kisminin baslangici -->
    <div class="container-fluid">
        <b>
        <div class="row bg-secondary text-light text-center justify-content-center mt-3 pb-4 pt-2" style="font-size: 17px">
            <div class="col-12 mb-2">
                <h5>Bize Ulaşın</h5>
            </div>
            <div class="col-4">
                <p class="nav-link bg-dark mx-2 rounded-lg border border-light">Telefon: +90 551-111-11-11</p>
            </div>
            <div class="col-4"> <!-- github linki :) -->
                <a class="nav-link bg-dark mx-2 rounded-lg border border-light text-light" href="https://github.com/MustafaAykut77/web-tabanli-programlama-bootstrap-proje">GitHub</a>
            </div>
            <div class="col-4">
                <p class="nav-link bg-dark mx-2 rounded-lg border border-light">E-Posta: mustafaykut77@gmail.com</p>
            </div>
        </div>
        </b>
    </div>
    <!-- Bize Ulasin kisminin bitisi -->

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