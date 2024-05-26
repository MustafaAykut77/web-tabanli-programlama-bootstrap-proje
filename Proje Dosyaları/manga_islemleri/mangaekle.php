<?php 
session_start(); 

require('mysqlbaglan.php'); 

// formda bos yer olmamasi icin kontrol.
if (!empty($_POST['manganame']) and !empty($_POST['mangatype']) and !empty($_POST['mangarate']) and !empty($_POST['releasedate']) and !empty($_POST['bitti'])){ 
    // form verilerinin cekilmesi
    extract($_POST); 

    // daha onceden boyle bir manga var mi diye kontrol etmek icin sql sorgusu
    $result = $baglanti->query("SELECT * FROM mangalar WHERE ad = '$manganame'");
    $row = $result->fetch_assoc();
    $say = mysqli_num_rows($result);

    // boyle bir manga yoksa veri tabanina kaydedilmesi.
    if($say == 0){
        
        //INSERT INTO ile veritabanina eklenmesi
        $sql = "INSERT INTO `mangalar` (ad, tur, puanlama, yayinlanma_yili, bitti) VALUES ('$manganame', '$mangatype', '$mangarate', '$releasedate', '$bitti')";  
        
        $cevap = mysqli_query($baglanti, $sql); 
        
        //sql sorgusu duzgun calistiysa basarili yazdilirmasi.
        if ($cevap){            
            $mesaj = '<div class="alert alert-success" role="alert">
                        Manga Oluşturuldu!
                        </div>';  
        }
        //sql sorgusu basarisiz ise basarisiz yazdirmasi.
        else{ 
            $mesaj = '<div class="alert alert-danger" role="alert">
                        Manga Oluşturulamadı!
                        </div>'; 
        } 
    }
    //ayni manga adinda baska bir manga varsa uyari yazdirilmasi
    else{
        $mesaj = '<div class="alert alert-danger" role="alert">
                Farklı bir manga adı seçin!
                </div>';
    }
}
// bos yer birakilmamasi icin uyari
else{
    $mesaj = '<div class="alert alert-danger" role="alert">
                Lütfen Boş Yer Bırakmayın!
             </div>';
 }

//eger ki bu siteye erismeye calisan kisi admin degilse ana sayfaya yonlendirilmesi
if (strcmp($_SESSION['username'], "admin") != 0){ 

    header("Location: ../index.php"); 
    
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  
        charset=UTF-8" />
        <title>Manga Ekleme</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body class="bg-dark text-light">
        <b>
        <!-- navbar baslangici -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary border border-light" style="font-size: 20px">
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

        <!-- manga ekleme formu baslangici -->
        <div class="container">
            <h2 class="text-center"><br>Manga Ekleme Formu</h2>
            <form action="<?php $_PHP_SELF ?>" method="POST"> <!-- form girilen degerleri kendine geri dondurur. -->
                <div class="form-group">
                <label for="manganame">Manga Adı</label>
                <input type="text" class="form-control" name="manganame">
                </div>
                <div class="form-group">
                <label for="mangatype">Manga Türü</label>
                <input type="text" class="form-control" name="mangatype">
                </div>
                <div class="form-group">
                <label for="mangarate">Manga Puanı</label>
                <input type="number" class="form-control" name="mangarate">
                </div>
                <div class="form-group">
                <label for="releasedate">Yayınlanma Yılı</label>
                <input type="date" class="form-control" name="releasedate">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bitti" value="Bitti" checked>
                    <label class="form-check-label" for="bitti">
                        Manga Bitti
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="bitti" value="Devam Ediyor">
                    <label class="form-check-label" for="bitti">
                        Manga Bitmedi
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Kaydet</button>
            </form>
            <?php if (isset($mesaj)) echo $mesaj; ?>  <!-- verilecek bir mesaj varsa ekrana yazdirir -->
        </div>
        <!-- manga ekleme formu bitisi -->

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