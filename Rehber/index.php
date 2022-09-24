<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bülten Ana Sayfa</title>
  </head>
  <body style="text-align:center;padding-top:20px;">
    <p><a href="index.php">Ana Sayfa</a> - <a href="liste.php">Kayıt Listesi</a> - <a href="giris.php">Giriş Yap</a></p>
    <hr><br>
    <form action="kaydet.php" method="post">
        <b>Ad Soyad:</b><br>
        <input type="text" name="adsoyad" size="40" required>
        <br><br>
        <b>Cep Telefonu:</b><br>
        <input type="tel" name="telefon" size="40" required>
        <br><br>
        <b>E-posta Adresi:</b><br>
        <input type="email" name="eposta" size="40" required>
        <br><br>
        <input type="submit" value="Kaydet">
    </form>
  </body>
</html>