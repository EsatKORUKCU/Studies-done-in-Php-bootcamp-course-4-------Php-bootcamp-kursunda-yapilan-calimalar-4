<?php
    require_once ('inc/config.php');

    $adsoyad = $_POST['adsoyad'];
    $telefon = $_POST['telefon'];
    $eposta = $_POST['eposta'];
    $tarih = date("Y-m-d H:i:s");
    $ipadres = $_SERVER['REMOTE_ADDR'];

    if (empty($adsoyad) || empty($telefon) || empty($eposta)) {
        echo "<script> alert('Lütfen Alanları Boş Bırakmayın!'); window.location.href = 'index.php'; </script>";
    }

    $kayit = $baglan->select('bulten', ['id'])->where('adsoyad', $adsoyad, '=')->where('eposta', $eposta, '=')->run(); // Kayıt var mı kontrolü

    //$kayit = $baglan->query("select id from bulten where (adsoyad='$adsoyad' && eposta='$eposta')"); // Class kullanmadan, normal PDO ile sorgulama

    if ($kayit[0]['id'] > 0) { // Kayıt varsa
        echo "<script> alert('Hata Oluştu, Bu Kayıt Zaten Var!'); window.location.href = 'index.php'; </script>";
    } else { // Kayıt yoksa
        $ekle = $baglan->insert('bulten', ['adsoyad' => $adsoyad, 'telefon' => $telefon, 'eposta' => $eposta, 'tarih' => $tarih, 'ipadres' => $ipadres])->run(); // Kayıt ekleme işlemi

        if ($baglan->rowCount() > 0) {
            echo "<script> alert('İşlem Başarılı, Kayıt Eklendi!'); window.location.href = 'index.php'; </script>";
        } else {
            echo "<script> alert('Hata Oluştu, Kayıt Eklenemedi!'); window.location.href = 'index.php'; </script>";
        }
    }
?>