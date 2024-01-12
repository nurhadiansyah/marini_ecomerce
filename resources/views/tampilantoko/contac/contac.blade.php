@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Profil</h1>
        </div>
    </div>


    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status Tranksaksi</h5>
                    {{-- <p>Add <code>.table-borderless</code> for a table without borders.</p> --}}
                    <!-- Active Table -->
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{ $transaksi->barang->nama_barang }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>{{ $transaksi->total }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Tables without borders -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection
