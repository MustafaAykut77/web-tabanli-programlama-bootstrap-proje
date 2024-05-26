<?php 
   require ('mysqlbaglan.php'); 
   
   // formda bos yer kalmamasi icin kontrol
   if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){ 
      
      // form verilerini cekme
      extract($_POST); 
      
      // veri tabaninda boyle bir kullanici var mi diye kontrol etmek icin sql sorgusu
      $result = $baglanti->query("SELECT * FROM kullanicilar WHERE kullaniciadi = '$username'");
      $row = $result->fetch_assoc();

      $say = mysqli_num_rows($result);
      // boyle bir kullanici yoksa kayit olma islemleri baslar
      if($say == 0){

         // sifreyi hashleme
         $password = hash('sha256', $password); 
         
         // veri tabanina kullaniciyi eklemek icin sql sorgusu
         $sql="INSERT INTO `kullanicilar` (kullaniciadi, sifre, eposta) VALUES ('$username', '$password', '$email')"; 

         $cevap = mysqli_query($baglanti, $sql); 
         // sql sorgusu duzgun calistiysa ekrana basarili mesaji yazdirir ve ana sayfaya geri doner.
         if($cevap){            
            $mesaj = '<div class="alert alert-success" role="alert">
                        Başarıyla kayıt olundu 5 saniye içinde ana sayfaya yönlendireleceksiniz...
                     </div>';
            //kayit olunan isim ile siteye otomatik olarak giris yapar.
            session_start();
            $_SESSION['username'] = $username;
            header("refresh: 5; URL=../index.php"); 
         }
         else{ 
            $mesaj = "<h1>Kullanıcı oluşturulamadı!</h1>"; 
         } 
      }
      // ayni isimde bir kullanici var uyarisi
      else{
         $mesaj = '<div class="alert alert-warning" role="alert">
                  Böyle bir kullanıcı var!
               </div>';
      }
   }
   // bos yer birakilmamasi icin uyari
   else{
      $mesaj = '<div class="alert alert-danger" role="alert">
                  Lütfen Boş Yer Bırakmayın!
               </div>';
   }
   
?> 

<!-- bootstrap ile yazilmis ana sayfa -->
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;  
         charset=UTF-8" />
      <title>Kaydol</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   </head>  
   <body class="bg-dark text-light">
      <!-- navbar baslangici -->
      <b>
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

      <!-- kayit formu baslangici -->
      <div class="container">
         <h2 class="text-center"><br>Kayıt Formu</h2>
         <form action="<?php $_PHP_SELF ?>" method="POST"> <!-- form bilgileri kendine geri gonderir. -->
            <div class="form-group">
               <label for="username">Kullanıcı Adı</label>
               <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
               <label for="email">E-Posta</label>
               <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
               <label for="password">Şifre</label>
               <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Gönder</button>
         </form>
   
         <?php if (isset($mesaj)) echo $mesaj; ?> 

      </div>
      <!-- kayit formu bitisi -->

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