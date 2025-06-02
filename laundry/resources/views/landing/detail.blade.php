<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Order Laundry</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="container">
        <div class="side">
            <h1>Detail Order</h1>
            <div class="back-button">
                <a href="{{ route('landing') }}">
                    <button>⬅ Kembali</button>
                </a>
            </div>
        </div>

        <div class="check_content">
            <div class="order-header">
                <p><strong>Nama:</strong> {{ $order->name }}</p>
                <p><strong>Nomor HP:</strong> {{ $order->phone }}</p>
                <p><strong>Kode Order:</strong> {{ $order->order_code ?? 'N/A' }}</p>
            </div>

            <div class="order-details-list">
                <div class="detail-item">
                    <span class="label">Jenis Barang:</span>
                    <span class="value">{{ $order->item_type }}</span>
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
                    <span class="label">Status:</span>
                    <span class="value">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="detail-item">
                    <span class="label">Waktu Transaksi:</span>
                    <span class="value">{{ $order->transaction_time }}</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
