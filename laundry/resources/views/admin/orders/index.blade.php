<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        /* Baris tabel clickable */
        table tbody tr {
            cursor: pointer;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        /* Supaya link dalam td tetap normal */
        table tbody tr td a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>

<body class="container" style="display: flex; min-height: 100vh;">

    {{-- Include Sidebar --}}
    @include('components.sidebar')

    {{-- Main --}}
    <div class="main" style="flex: 1; padding: 20px;">
        <h1>Daftar Order</h1>

        <div class="top-bar"
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <form method="GET" style="display: flex; gap: 10px;">
                <select name="filter" onchange="this.form.submit()">
                    <option value="">Filter Jenis Barang</option>
                    <option value="baju" {{ request('filter') === 'baju' ? 'selected' : '' }}>Baju</option>
                    <option value="kain_besar" {{ request('filter') === 'kain_besar' ? 'selected' : '' }}>Kain Besar
                    </option>
                    <option value="sepatu" {{ request('filter') === 'sepatu' ? 'selected' : '' }}>Sepatu</option>
                    <option value="lainnya" {{ request('filter') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @if(request()->has('filter'))
                    <a href="{{ route('admin.orders.index') }}">
                        <button type="button">Reset</button>
                    </a>
                @endif
            </form>


            <div class="buttons">
                <a href="{{ route('admin.orders.create') }}">
                    <button class="add" type="button">Tambah Baru</button>
                </a>
            </div>

        </div>

        <div class="table-container" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th></th>
                        <th>Kode Order</th>
                        <th>Service</th>
                        <th>Berat</th>
                        <th>Status</th>
                        <th>Waktu Transaksi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr data-href="{{ route('admin.orders.show', $order->id) }}">
                            <td>
                                <div class="item-icon">
                                    <img src="{{ asset('asset/icons8-' . $order->item_type . '.png') }}"
                                        alt="{{ $order->item_type }}">
                                </div>
                            </td>
                            <td>#{{ $order->order_code }}</td>
                            <td>{{ $order->service->name }}</td>
                            <td>{{ $order->weight }} kg</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->transaction_time)->format('d M Y H:i') }}</td>
                            <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">Belum ada data order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Buat seluruh baris clickable
        document.addEventListener('DOMContentLoaded', function () {
            const rows = document.querySelectorAll('tbody tr[data-href]');
            rows.forEach(row => {
                row.addEventListener('click', () => {
                    window.location = row.dataset.href;
                });
            });
        });
    </script>

</body>

</html>