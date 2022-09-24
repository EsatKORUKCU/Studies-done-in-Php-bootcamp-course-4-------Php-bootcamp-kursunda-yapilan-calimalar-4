<?php
//PANEL GİRİŞ İŞLEMLERİ
session_start();

$kullanici = $_POST["kullanici"];
$sifre = $_POST["sifre"];

//Veritabanı Bağlantısı Kurulup, Bu Bilgilere Sahip Kullanıcı Kontrol Edilir.

$kullanicilar = array("ahmet","mehmet","tarik");

//if ($kullanici == "admin" && $sifre == "1234") {
if (in_array($kullanici, $kullanicilar) && $sifre == "1234") {

    $kontrol = md5("ibb"); //Kısmi güvenlik için bir veri MD5 ile şifrelendi
    setcookie("giris",$kontrol,time()+60*60); //Üye giriş kontrolü için 1 saatlik çerez
    $_SESSION["kontrol"] = sha1(md5("ismek")); //Üye giriş kontrolü için oturum dosyası
    header("Location: anasayfa.php");

} else {
    //header("Location: index.html");
    echo "
    <script>
        alert('Hatalı Kullanıcı Bilgisi!');
        window.location.href = 'index.html';
    </script>
    ";
}


?>