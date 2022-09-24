<?php
//PANEL ÇIKIŞ İŞLEMLERİ
session_start();

setcookie("giris","",time()-1); //Çerez dosyasının içi boşaltılıp silindi

$_SESSION["kontrol"] = ""; //Oturum dosyasının içi boşaltıldı
session_unset($_SESSION["kontrol"]); // Oturum dosyası silindi

header("Location: index.html");

?>