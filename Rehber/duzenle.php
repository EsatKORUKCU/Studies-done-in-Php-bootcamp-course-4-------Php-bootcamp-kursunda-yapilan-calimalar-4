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

    $sorgu = $baglan->select('bulten')->where('id', $kayitno, '=')->run(); // Sql sorgusu
    if ($baglan->rowCount() <= 0) {header("Location: yonetim.php");} // Kayıt yoksa
    foreach ($sorgu as $satir) {$bilgiler = $satir;} // Bilgileri dizi içine ekle
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bülten Düzenleme</title>
  </head>
  <body style="text-align:center;padding-top:20px;">
    <p><a href="yonetim.php">İşlemler</a> - <a href="cikis.php" onclick="if (!confirm('Çıkış yapmak istediğinize emin misiniz?')) {return false;}">Çıkış Yap</a></p>
    <hr><br>
    <form action="islem.php" method="post">
        <b>Ad Soyad:</b><br>
        <input type="text" name="adsoyad" size="40" value="<?php echo $bilgiler['adsoyad']; ?>" required>
        <br><br>
        <b>Cep Telefonu:</b><br>
        <input type="tel" name="telefon" size="40" value="<?php echo $bilgiler['telefon']; ?>" required>
        <br><br>
        <b>E-posta Adresi:</b><br>
        <input type="email" name="eposta" size="40" value="<?php echo $bilgiler['eposta']; ?>" required>
        <br><br>
        <input type="hidden" name="id" value="<?php echo $bilgiler['id']; ?>">
        <input type="submit" value="Kaydet">
    </form>
  </body>
</html>