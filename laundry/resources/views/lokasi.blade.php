<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laundry Toar - Home</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

  <header>
    <div class="logo">
      <a href="{{ route('landing') }}">Laundry Toar</a>
    </div>
    <nav>
      <a href="{{ route('check.order') }}">Cek Laundry</a>
      <a href="{{ route('lokasi') }}">Lokasi</a>
      <a href="{{ route('admin.dashboard') }}">Login</a>

    </nav>
  </header>

  <section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.858837953162!2d124.84005882675844!3d1.3186219670706012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32876d81380a14cd%3A0x7000fc1e63f8bfe7!2sTOAR%20LAUNDRY%20%26%20KOST!5e0!3m2!1sid!2sid!4v1745841852498!5m2!1sid!2sid" width="1480" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <button onclick="window.open('https://maps.google.com')">Buka di Google Maps</button>
  </section>

  <footer>
    <div class="logo">Laundry Toar</div>
    <div class="socials">
      <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/628123456789" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>
  </footer>

</body>

</html>