<?php
require 'vendor/autoload.php';


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$jwtkey = '70f98e89f063c9ed5f4dd3f1aeb699792b301ebbafa217fab19049b21e174d597f75f48fefa9c299eb95fc97515e4af86034f0a28a42e72643150737e8607c3a';

if (isset($_COOKIE['token'])) {
  $decoded = JWT::decode($_COOKIE['token'], new Key($jwtkey, 'HS256'));
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header.css">
 
  

</head>

<body>

  <div class="header">
    <nav>
      <ul class="sidebar">
        
        <li onclick="hideSidebar()">
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
              <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg></a>
        </li>
        <li><a id="admingiris" href="index.php">Ana Sayfa</a></li>
        <?php if (isset($_COOKIE['token'])) { ?> <li id="admingiris">
            <a href="profilduzenle.php"><?php echo $decoded->data->UserName; ?></a>
          <?php }   ?></li>
        
          <?php if (isset($_COOKIE['token']) && $decoded->data->UserName == "admin")
           { ?>
          <li id="admingiris"><a href="adminPaneli.php">Admin paneli</a></li>
        <?php } ?>
        
        <li id="admingiris"><a href="#duyuruu">Duyurular</a></li>
        
        <li><a href="#takvim1">Yemek Takvimi</a></li>
        <li>  <?php if (isset($_COOKIE['token'])) { ?>
          <a href="logout.php" >
            Çıkış yap
            
          </a>
        <?php } else { ?>
          <a href="login.php" >
            Giriş yap
            
          </a>
        <?php } ?></li>

      </ul>

      <ul>

        <li style="display: flex;">
          <img src="images/logo.png" #idstyle="width: 50px;margin-left:30px"> <a href="index.php">Gazi Yemekhane</a>
        </li>
        <?php if (isset($_COOKIE['token']) && $decoded->data->UserName == "admin") { ?>
          <li id="admin" class="hideOnMobile">
            <a href="adminPaneli.php">Admin paneli</a>
          </li>
        <?php } ?>
        
        <li id="admin" class="hideOnMobile"><a href="#duyuruu">Duyurular</a></li>
        <li class="hideOnMobile"><a href="#takvim1">Yemek Takvimi</a></li>

        <li class="hideOnMobile">
        <?php if (isset($_COOKIE['token'])) { ?>
            <a href="profilduzenle.php"><?php echo $decoded->data->UserName; ?></a>
          <?php }   ?>
         
        </li>
        <li>  <?php if (isset($_COOKIE['token'])) { ?>
          <a href="logout.php" >
            Çıkış yap
            
          </a>
        <?php } else { ?>
          <a href="login.php">Giriş yap
          </a>
        <?php } ?></li>

        <li class="menu-button" onclick="showSidebar()">
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
              <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg></a>
        </li>
      </ul>
      
    </nav>
    

   
</body>

</html>