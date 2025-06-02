<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script>
        function updatePrice() {
            const select = document.getElementById('service_id');
            const weight = parseFloat(document.getElementById('weight').value) || 0;
            const servicePrice = parseInt(select.options[select.selectedIndex].dataset.price) || 0;
            const total = servicePrice * weight;
            document.getElementById('price-display').innerText = total > 0 ? `Rp ${total.toLocaleString('id-ID')}` : '-';
        }
    </script>
</head>
<body class="container">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar', ['active' => 'orders'])

    {{-- Main --}}
    <div class="main">
        <h1>Tambah Order Laundry</h1>

        <form action="{{ route('admin.orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="phone">Nomor HP</label>
                <input type="text" name="phone" id="phone" required>
            </div>

            <div class="form-group">
                <label for="service_id">Paket Layanan</label>
                <select name="service_id" id="service_id" onchange="updatePrice()" required>
                    <option value="">-- Pilih Paket --</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" data-price="{{ $service->price_per_kg }}">
                            {{ $service->name }} (Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}/kg)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="weight">Berat (kg)</label>
                <input type="number" name="weight" id="weight" step="0.01" oninput="updatePrice()" required>
            </div>

            <div class="form-group">
                <label>Harga Total:</label>
                <p id="price-display" style="font-weight: bold; color: #00aaff;">-</p>
            </div>

            <div class="form-group">
                <label for="item_type">Jenis Barang</label>
                <select name="item_type" id="item_type" required>
                    <option value="baju">Baju</option>
                    <option value="kain_besar">Kain Besar</option>
                    <option value="sepatu">Sepatu</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="note">Catatan</label>
                <textarea name="note" id="note" rows="3"></textarea>
            </div>

            <button type="submit" class="add">Simpan Order</button>
        </form>
    </div>
</body>
</html>
