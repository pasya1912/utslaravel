@extends('utama')
@section('content')
    @include('index.form')
    <div class="row mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h4 class="card-title">List Barang</h4>
                        <p class="card-description">
                            Ini list barang yang sudah ada
                        </p>
                    </div>
                    <div class="col-md-6 col-12 text-end">
                        <a href="{{ route('clear') }}" class="btn btn-danger ">Clear Data</a>
                    </div>
                </div>
                @include('index.table')
                @include('index.total')
            </div>
        </div>
    @endsection

    @push('custom-bottom')
        @if (session('message'))
            <script>
                alert("{{ session('message') }}");
            </script>
        @endif

    @endpush
