@extends('utama')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Barang</h4>
                <p class="card-description">
                    ini form barang cui
                </p>
                <form class="forms-sample" action="{{ route('update', $barang->id) }}" method="POST" id="form">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code Barang</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Code Barang" value="{{ $barang->code }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang" value="{{ $barang->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Varian</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Varian" value="{{ $barang->jenis }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Barang" value="{{ $barang->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah Barang</label>
                        <input type="text" class="form-control" id="qty" name="qty"
                            placeholder="Jumlah Barang" value="{{ $barang->qty }}">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Edit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
