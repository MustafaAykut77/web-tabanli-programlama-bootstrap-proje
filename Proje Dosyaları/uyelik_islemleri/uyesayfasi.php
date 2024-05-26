<?php 
   //oturumu başlat 
   session_start(); 
   
   require('mysqlbaglan.php'); 

   //henuz giris yapilmadiysa giris sayfasina yonlendir.
   
   if (empty($_SESSION['username'])) { 
      header("Location: login.php"); 
      exit(); 
   } 
?> 

<!-- bootstrap ile yapilmis uye sayfasi -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Üye Sayfası</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
   <body class="bg-dark text-light">
   <b>
   <!-- ana sayfada da bulunan navbar yani navigation bar'in aynisi bundan sonra aciklanmayacak -->
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

      <!-- kullanicinin bilgilerinin veri tabanindan cekilmesi icin mysql sorgusu -->
      <?php
         $var = $_SESSION['username'];
         $result = $baglanti->query("SELECT * FROM kullanicilar WHERE kullaniciadi = '$var'");
         $row = $result->fetch_assoc();
      ?>

      <div class="container mt-3 text-light mb-5">
         <!-- hosgeldiniz mesaji -->
         <h3 class="text-center">Merhaba <?php echo $_SESSION['username'] ?>, <br> 
         Profil sayfanıza hoş geldiniz.</h3>
         <!-- bootstrap list ile kullanicinin bilgilerinin ekrana yazdirilmasi -->
         <ul class="list-group">
            <li class="list-group-item list-group-item-secondary"><b>Kullanıcı adı:</b> <?php echo $row['kullaniciadi']?></li>
            <li class="list-group-item list-group-item-secondary"><b>E-Posta:</b> <?php echo $row['eposta']?></li>
         </ul>
         <br>
         <!-- profili duzenleme veya cikis yapma tuslarinin olusturulmasi. -->
         <div class="row text-center justify-content-center">
            <?php echo "<a class='col-5 nav-link bg-info mx-2 mt-3 rounded-lg border border-light text-center text-light' href='bilgileriguncelle.php?id=".$row['kullanici_id']."'>Profili Düzenle</a>" ?>
            <a class="col-5 nav-link bg-danger mx-2 mt-3 rounded-lg border border-light text-center text-light" href="./logout.php">Çıkış yap</a>
         </div>
         <!-- eger ki kullanici admin ise admine ozel olan komutlarin ekrana yazdirilmasi. -->
         <?php 
            if($_SESSION['username'] == "admin"){
               echo '<br><br>';
               echo '<div class="alert alert-success mt-5" role="alert">
                        Admin olduğunuz için aşağıdaki özel komutları kullanabilirsiniz :)
                     </div>'; 

               echo '<div class="row text-center justify-content-center">'; 
               echo '<a class="col-3 nav-link bg-success mt-3 mx-2 rounded-lg border border-light text-center text-dark" href="../manga_islemleri/mangaekle.php"><b>Manga Ekle</b></a>';
               echo '<a class="col-3 nav-link bg-success mt-3 mx-2 rounded-lg border border-light text-center text-dark" href="../manga_islemleri/mangalaradmin.php"><b>Manga Sil</b></a>';
               echo '<a class="col-3 nav-link bg-success mt-3 mx-2 rounded-lg border border-light text-center text-dark" href="../uyelik_islemleri/kullanicilar.php"><b>Kullanıcıları Görüntüle</b></a>';
               echo '</div>';
            } 
         ?>

      </div>

      <!-- ana sayfada da bulunan bize ulasin kisminin aynisi bundan sonra aciklanmayacak. -->
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
