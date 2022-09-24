<?php
    session_start();
    require_once ('inc/config.php');

    // Kullanıcı giriş kontrolü (başlama)
    if (!isset($_SESSION['yonetici'])) {header("Location: giris.php");}
    $sorgu = $baglan->select('yonetici', ['kullanici'])->where('id', $_SESSION['yonetici'], '=')->run();
    if (empty($sorgu[0]['kullanici'])) {header("Location: giris.php");}
    // Kullanıcı giriş kontrolü (bitiş)
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bülten Yönetim</title>
  </head>
  <body style="text-align:center;padding-top:20px;">
    <p><a href="yonetim.php">İşlemler</a> - <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) {return false;}">Çıkış Yap</a></p>
    <hr><br>
    <?php
        $sorgu = $baglan->select('bulten')->orderBy('adsoyad', 'asc')->run();
        if ($baglan->rowCount() > 0) {
            echo "<table border='1' width='100%'>
            <tr>
            <td>ID</td>
            <td>Ad Soyad</td>
            <td>Cep Telefonu</td>
            <td>E-posta Adresi</td>
            <td>IP Adresi</td>
            <td>Kayıt Tarihi</td>
            <td>İşlemler</td>
            </tr>";

            foreach ($sorgu as $satir) { 
                echo "<tr>
                <td>$satir[id]</td>
                <td>$satir[adsoyad]</td>
                <td>$satir[telefon]</td>
                <td>$satir[eposta]</td>
                <td>$satir[ipadres]</td>
                <td>$satir[tarih]</td>
                <td><a href='duzenle.php?id=$satir[id]'>Düzenle</a> - <a href='sil.php?id=$satir[id]' onclick=\"if (!confirm('Silmek istediğinize emin misiniz?')) return false;\">Sil</a></td>
                </tr>";
            }

            echo "</table>";
            echo "<p><b>Toplam ".$baglan->rowCount()." Kayıt Bulundu.</b></p>";
        } else {
            echo "<p><b>Sistemde Hiç Kayıt Bulunamadı!</b></p>";
        }
    ?>
  </body>
</html>