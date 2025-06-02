<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Laundry</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container">
        <div class="side">
            <h1>Cek Laundry</h1>
            <div class="back-button">
                <a href="{{ route('landing') }}">
                    <button>⬅ Kembali</button>
                </a>
            </div>
        </div>

        <div class="check_content">
            <div class="input-box">
                <h3>Cek status laundry mu!</h3>
                @if ($errors->any())
                    <div style="color: red; font-weight: bold;">
                        {{ $errors->first('order_code') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('search.order') }}">
                    @csrf
                    <input type="text" name="order_code" id="order_code" placeholder="Masukkan kode orderan" required>
                    <br>
                    <button type="submit">Cek sekarang ➔</button>
                </form>
            </div>
        </div>
    </div>
</body>


</html>