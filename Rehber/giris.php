<?php
    session_start();
    require_once ('inc/config.php');

    if ($_POST) {
        $kullanici = $_POST['kullanici'];
        $sifre = $_POST['sifre'];

        $sorgu = $baglan->select('yonetici', ['id'])->where('kullanici', $kullanici, '=')->where('sifre', $sifre, '=')->run();

        if ($sorgu[0]['id'] > 0) { // Kullanıcı varsa
            $_SESSION['yonetici'] = $sorgu[0]['id']; // Giriş kontrol araçları
            echo "<script> window.location.href = 'yonetim.php'; </script>";
        } else { // Kullanıcı yoksa
            echo "<script> alert('Hata Oluştu, Böyle Bir Kullanıcı Yok!'); window.location.href = 'giris.php'; </script>";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bülten Giriş</title>
  </head>
  <body style="text-align:center;padding-top:20px;">
    <p><a href="index.php">Ana Sayfa</a> - <a href="liste.php">Kayıt Listesi</a> - <a href="giris.php">Giriş Yap</a></p>
    <hr><br>
    <form action="giris.php" method="post">
        <b>Kullanıcı: (mehmet)</b><br>
        <input type="text" name="kullanici" size="40" required>
        <br><br>
        <b>Şifre: (12345)</b><br>
        <input type="password" name="sifre" size="40" required>
        <br><br>
        <input type="submit" value="Giriş Yap">
    </form>
  </body>
</html>