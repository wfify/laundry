<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body class="container">
    <div class="side">
        <h1>Detail Order</h1>
        <div class="back-button">
            <a href="{{ route('admin.orders.index') }}">
                <button>⬅ Kembali</button>
            </a>
        </div>
    </div>

    <div class="check_content">
        <div class="order-header">
            <p><strong>Kode Order:</strong> {{ $order->order_code }}</p>
            <p><strong>Nama:</strong> {{ $order->name }}</p>
            <p><strong>Nomor HP:</strong> {{ $order->phone }}</p>
        </div>

        <div class="order-details-list">
            <div class="detail-item">
                <span class="label">Jenis Barang:</span>
                <span class="value">{{ ucfirst($order->item_type) }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Service:</span>
                <span class="value">{{ $order->service->name }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Berat (kg):</span>
                <span class="value">{{ $order->weight }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Harga:</span>
                <span class="value">Rp {{ number_format($order->price, 0, ',', '.') }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Waktu Transaksi:</span>
                <span class="value">{{ $order->transaction_time }}</span>
            </div>
            <div class="detail-item">
                <span class="label">Catatan:</span>
                <span class="value">{{ $order->note ?? '-' }}</span>
            </div>
        </div>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="form-status">
            @csrf
            @method('PUT')

            <label>Status:</label>
            <select name="status" required>
                <option value="menunggu" {{ $order->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="diambil" {{ $order->status == 'diambil' ? 'selected' : '' }}>Diambil</option>
            </select>

            <button type="submit">Update Order</button>
        </form>
    </div>
</body>

</html>