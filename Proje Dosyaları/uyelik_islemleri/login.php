<?php
   // oturum baslatilir.
   session_start(); 
   
   require('mysqlbaglan.php'); 
   
   // formda bos yer kalmamasi icin kontrol yapilir.
   if (isset($_POST['username']) and isset($_POST['password'])){ 
      
      //form verileri cekilir.
      extract($_POST); 

      //girilen sifre hashlenir. 
      $password = hash('sha256', $password); 
      
      //girilen kullanici adi ve hashlenen sifre veri tabaninda arastirilir.
      $sql = "SELECT * FROM `kullanicilar` WHERE ";  
      $sql= $sql . "kullaniciadi='$username' and sifre='$password'"; 
      
      $cevap = mysqli_query($baglanti, $sql); 
      
      //sql sorgusununu donutu yanlissa hata yazdirilir.      
      if(!$cevap ){ 
      
         echo '<br>Hata:' . mysqli_error($baglanti); 
      
      } 
      
      //veritabanindan donen satir sayisi bulunur.
      $say = mysqli_num_rows($cevap); 
      
      //bu kriterlere uyan 1 kullanici varsa giris yapilir.
      if ($say == 1){      
         $_SESSION['username'] = $username;      
      }
      else{ 
         //sifir veya birden cok uyan varsa hata mesaji yazdirilir.
         $mesaj = '<div class="alert alert-danger" role="alert">
                     Hatalı kullanıcı adı veya şifre!
                  </div>'; 
      } 
   
   } 
   
   //zaten giris yapilmissa uye sayfasina yonkendirir.
   if (isset($_SESSION['username'])){ 
      header("Location: uyesayfasi.php"); 
   }
   else{ 
   //giris yapilmamissa form ekrana yazdirilir.
   
   ?> 
<html>
   <head>
   <meta http-equiv="Content-Type" content="text/html;  
      charset=UTF-8" />
   <title>Giriş Yap</title>
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

      <!-- giris formu -->
      <div class="container">
         <h2 class="text-center"><br>Giriş Formu</h2>
         <form action="<?php $_PHP_SELF ?>" method="POST"> <!-- form girilen degerleri kendine geri dondurur -->
            <div class="form-group">
               <label for="username">Kullanıcı Adı</label>
               <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
               <label for="password">Şifre</label>
               <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Giriş</button>
         </form>
   
         <?php if (isset($mesaj)) echo $mesaj; ?> <!-- daha onceden bir mesaj olusturulduysa formun altina bu mesaji yazdirir. -->
      </div>
      <!-- giris formu bitisi -->

      <!-- bize ulasin -->
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

   </body>

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" 
        crossorigin="anonymous"></script>
</html>
<?php } ?>