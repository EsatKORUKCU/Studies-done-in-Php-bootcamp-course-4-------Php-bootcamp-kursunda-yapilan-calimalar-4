<?php
    session_start();
    require_once ('inc/config.php');

    // Kullanıcı giriş kontrolü (başlama)
    if (!isset($_SESSION['yonetici'])) {header("Location: giris.php");}
    $sorgu = $baglan->select('yonetici', ['kullanici'])->where('id', $_SESSION['yonetici'], '=')->run();
    if (empty($sorgu[0]['kullanici'])) {header("Location: giris.php");}
    // Kullanıcı giriş kontrolü (bitiş)

    $kayitno = $_GET["id"]; // Adres çubuğundan gelen id no

    if (empty($kayitno) || $kayitno <= 0) {header("Location: yonetim.php");} // Adres çubuğundan id no geldi mi

    $baglan->delete('bulten')->where('id', $kayitno, '=')->run(); // Sql sorgusu

    if ($baglan->rowCount() > 0) { // Kayıt silindiyse
        echo "<script> alert('Toplam ".$baglan->rowCount()." Kayıt Silindi!'); window.location.href = 'yonetim.php'; </script>";
    } else { // Kayıt silinmediyse
        echo "<script> alert('Silme İşlemi Başarısız!'); window.location.href = 'yonetim.php'; </script>";
    }
?>