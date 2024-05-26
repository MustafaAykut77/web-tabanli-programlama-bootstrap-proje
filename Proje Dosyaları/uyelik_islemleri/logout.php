<!-- cikis yapmak icin session yok edilir. -->
<?php 
   session_start(); 
   
   session_destroy(); 
   
   header('Location: login.php'); 
   
   ?>