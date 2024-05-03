@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Riwayat Transaksi</h1>
        </div>
    </div>


    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status Transaksi</h5>
                    {{-- <p>Add <code>.table-borderless</code> for a table without borders.</p> --}}
                    <!-- Active Table -->
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kode Pesanan</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Tanggal Terima</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $transaksi->barang?->nama_barang }}</td>
                                    <td>{{ $transaksi->kode_pesanan }}</td>
                                    <td>{{ $transaksi->tgl_pesan }}</td>
                                    <td>{{ $transaksi->tgl_terima }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>@currency($transaksi->total)</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>{{ $transaksi->keterangan }}</td>
                                    <td>
                                        @if ($transaksi->status == "Selesai")
                                            Pesanan Selesai
                                        @elseif ($transaksi->status == "Batal")
                                            Pesanan Dibatalkan
                                        @else
                                            <form action="/transaksi/{{ $transaksi->id }}" method="POST" role="form text-left">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" name="status" value="Batal">
                                                <div class="">
                                                    <button type="submit"
                                                        class="btn btn-danger btn-round btn-sm mb-0">Batalkan Pesanan</button>
                                                </div>
                                            </form>
                                        @endif

                                    </td>
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
