<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body style="display: flex; min-height: 100vh;">

    {{-- Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <div class="main">
        <h1>Dashboard Admin Laundry</h1>

        <div class="top-categories">
        <a href="{{ route('admin.orders.index', ['filter' => 'baju']) }}">
            <div class="category">
                <img src="{{ asset('asset/icons8-baju.png') }}" class="category-img" alt="Baju">
                <p>Baju</p>
            </div>
        </a>
        <a href="{{ route('admin.orders.index', ['filter' => 'kain_besar']) }}">
            <div class="category">
                <img src="{{ asset('asset/icons8-kain_besar.png') }}" class="category-img" alt="Selimut">
                <p>Selimut</p>
            </div>
        </a>
        <a href="{{ route('admin.orders.index', ['filter' => 'sepatu']) }}">
            <div class="category">
                <img src="{{ asset('asset/icons8-sepatu.png') }}" class="category-img" alt="Sepatu">
                <p>Sepatu</p>
            </div>
        </a>
        <a href="{{ route('admin.orders.index', ['filter' => 'lainnya']) }}">
            <div class="category">
                <img src="{{ asset('asset/icons8-lainnya.png') }}" class="category-img" alt="Lainnya">
                <p>Lainnya</p>
            </div>
        </a>
    </div>

        <div class="dashboard-grid" style="margin-top: 30px; display: flex; gap: 20px;">
            {{-- Kiri --}}
            <div class="latest" style="flex: 2;">
                <h2>Orderan Terbaru</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Kode Order</th>
                                <th>Nama</th>
                                <th>Jenis Barang</th>
                                <th>Status</th>
                                <th>Waktu Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestOrders as $order)
                                <tr>
                                    <td>
                                        <div class="dash-item-icon">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="item-link">
                                                <img src="{{ asset('asset/icons8-' . $order->item_type . '.png') }}"
                                                    alt="{{ $order->item_type }}">
                                            </a>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="item-link">#{{ $order->order_code }}</a></td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="item-link">{{ $order->name }}</a></td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="item-link">{{ ucfirst($order->item_type) }}</a></td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="item-link">{{ ucfirst($order->status) }}</a></td>
                                    <td><a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="item-link">{{ \Carbon\Carbon::parse($order->transaction_time)->format('d M Y H:i') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center;">Belum ada order.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('admin.orders.index') }}">
                    <button class="lihat-semua">Lihat Semua Order</button>
                </a>
            </div>

            {{-- Kanan --}}
            <div class="side-panel" style="flex: 1; display: flex; flex-direction: column; gap: 20px;">
                <div class="income">
                    <h2>Pendapatan</h2>
                    <p class="amount">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                </div>

                <div class="report">
                    <h2>Laporan</h2>
                    <div class="report-details">
                        <p>Total: {{ $totalOrders }}</p>
                        <p>Diterima: {{ $processingOrders }}</p>
                        <p>Dalam Proses: {{ $doneOrders }}</p>
                        <p>Selesai: {{ $collectedOrders }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>