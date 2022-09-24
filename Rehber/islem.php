<?php
    session_start();
    require_once ('inc/config.php');

    // Kullanıcı giriş kontrolü (başlama)
    if (!isset($_SESSION['yonetici'])) {header("Location: giris.php");}
    $sorgu = $baglan->select('yonetici', ['kullanici'])->where('id', $_SESSION['yonetici'], '=')->run();
    if (empty($sorgu[0]['kullanici'])) {header("Location: giris.php");}
    // Kullanıcı giriş kontrolü (bitiş)

    $adsoyad = $_POST["adsoyad"];
    $telefon = $_POST["telefon"];
    $eposta = $_POST["eposta"];
    $kayitno = $_POST["id"];

    if (empty($adsoyad) || empty($telefon) || empty($eposta) || empty($kayitno) || $kayitno <= 0) {header("Location: yonetim.php");} // Post ile gelen veriler eksikse

    $baglan->update('bulten', ['adsoyad' => $adsoyad, 'telefon' => $telefon, 'eposta' => $eposta])->where('id', $kayitno, '=')->run(); // Sql sorgusu

    if ($baglan->rowCount() > 0) { // Kayıt düzenlendiyse
        echo "<script> alert('Toplam ".$baglan->rowCount()." Kayıt Düzenlendi!'); window.location.href = 'yonetim.php'; </script>";
    } else { // Kayıt düzenlenmediyse
        echo "<script> alert('Düzenleme İşlemi Başarısız!'); window.location.href = 'yonetim.php'; </script>";
    }

?>