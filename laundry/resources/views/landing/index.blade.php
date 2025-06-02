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

  <section class="hero">
    <div class="hero-text">
      <h1>Solusi terbaik untuk masalah laundry anda!</h1>
      <p>Laundry Toar menyediakan berbagai layanan mulai dari
        mencuci sampai dengan setrika dan lipat. Pakaian, selimut, sepatu, bahkan tas
        percayakan saja pada kami.
      </p>
      <a href="{{ route('check.order') }}">
        <button class="add" type="button">Cek Laundry Anda Sekarang!</button>
      </a>
    </div>
    <div class="hero-image">
      <img src="{{ asset('asset/mesin_cuci.png') }}" alt="Mesin Cuci">
    </div>
  </section>

  <section class="steps">
    <h2>Hanya dengan 4 langkah mudah</h2>
    <div class="step-cards">
      <div class="card">
        <h3>Step 1</h3>
        <img src="{{ asset('asset/antar.png') }}" alt="Antar" class="step-img">
        <p>Antar</p>
      </div>
      <div class="card">
        <h3>Step 2</h3>
        <img src="{{ asset('asset/proses.png') }}" alt="Proses" class="step-img">
        <p>Proses</p>
      </div>
      <div class="card">
        <h3>Step 3</h3>
        <img src="{{ asset('asset/cek.png') }}" alt="Cek" class="step-img">
        <p>Cek</p>
      </div>
      <div class="card">
        <h3>Step 4</h3>
        <img src="{{ asset('asset/ambil.png') }}" alt="Ambil" class="step-img">
        <p>Ambil</p>
      </div>
    </div>
  </section>

  <section class="packages">
    <h2>Paket yang tersedia:</h2>
    <div class="package-cards">
      <div class="package">
        <h3>Paket A</h3>
        <p><em>Cocok untuk pakaian sehari-hari yang tidak perlu di setrika.</em></p>
        <div class="checkbox-container">
          <label><input type="checkbox" checked disabled> Cuci</label><br>
          <label><input type="checkbox" checked disabled> Lipat</label>
        </div>
        <p class="price">Rp 7.000 / kg</p>
      </div>
      <div class="package featured">
        <h3>Paket B</h3>
        <p><em>Cocok untuk seragam dan pakaian kerja.</em></p>
        <div class="checkbox-container">
          <label><input type="checkbox" checked disabled> Cuci</label><br>
          <label><input type="checkbox" checked disabled> Setrika</label><br>
          <label><input type="checkbox" checked disabled> Lipat</label>
        </div>
        <p class="price">Rp 10.000 / kg</p>
      </div>
      <div class="package">
        <h3>Paket C</h3>
        <p><em>Paket khusus untuk kain-kain besar seperti selimut, horden, dsb.</em></p>
        <div class="checkbox-container">
          <label><input type="checkbox" checked disabled> Cuci</label>
        </div>
        <p class="price">Rp 9.000 / kg</p>
      </div>
    </div>
  </section>

  <section class="faq" id="hubungi">
    <div class="faq-content">
      <div class="faq-image">
        <img src="{{ asset('asset/tanya.png') }}" alt="Tanya" class="faq-img">
      </div>
      <div class="faq-text">
        <h2>Punya pertanyaan?</h2>
        <a href="https://wa.me/6285696272909" target="_blank">
        <button>Chat dengan admin</button></a>
      </div>
    </div>
  </section>

  <footer>
    <div class="logo">Laundry Toar</div>
    <div class="socials">
      <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/6285696272909" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>
  </footer>

</body>

</html>