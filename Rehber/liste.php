<?php
    require_once ('inc/config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bülten Liste</title>
  </head>
  <body style="text-align:center;padding-top:20px;">
    <p><a href="index.php">Ana Sayfa</a> - <a href="liste.php">Kayıt Listesi</a> - <a href="giris.php">Giriş Yap</a></p>
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
            </tr>";

            foreach ($sorgu as $satir) { 
                echo "<tr>
                <td>$satir[id]</td>
                <td>$satir[adsoyad]</td>
                <td>$satir[telefon]</td>
                <td>$satir[eposta]</td>
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