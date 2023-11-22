<div class="row">
    <div class=" table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Varian</th>
                    <th>Qty</th>
                    <th>Harga Jual</th>
                    <th>Total Harga</th>
                    <th>Total Harga Setelah Diskon</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr style="text-align: center;">
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->total_bayar }} ({{ $item->diskon * 100 }}% off)</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
