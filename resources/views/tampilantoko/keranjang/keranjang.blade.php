@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="container">

            <form action="/transaksi" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status" value="Pending">
                <input type="hidden" name="kode_pesanan" value="{{ $kode_pesanan }}">
                <input type="hidden" name="tgl_pesan" value="{{ date('d / m / Y') }}">
                <input type="hidden" name="tgl_terima" value="Pending">

                <!-- {{ date('d / m / Y') }} // {{ $kode_pesanan }} -->
                @php
                    $i = 1;
                @endphp
                @foreach($keranjangs as $keranjang)

                {{-- <input type="hidden" name="barang_id" value="{{ $keranjang->barang->id}}"> --}}
                <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="form-check">
                        <input class="form-check-input" name="keranjang_id[]" value="{{ $keranjang->id}}" type="checkbox" id="gridCheck{{ $keranjang->id}}">
                        <label class="form-check-label" for="gridCheck{{ $keranjang->id}}">
                          <div class="row">
                            <div class="col">
                                <span>Nama Barang    :{{ $keranjang->barang->nama_barang}}</span>
                            </div>

                            <br>
                            <span>Jumlah barang     :{{ $keranjang->jumlah}}</span>
                            <br>
                            <span class="col">Total harga   :{{ $keranjang->total}}</span>
                            <div style="max-width:150px; overflow:hidden;" class="col rounded float-end">
                                <img src="{{ asset('storage/' . $keranjang->barang->gambar) }}" alt="" class="img-fluid">
                            </div>
                          </div>
                        </label>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
                @endforeach

                {{-- <a href="http://masuk{{ $keranjang->total }}">coba</a> --}}
                <button class="btn btn-success" type="submit">Checkout</button>
            </form>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->

    <!--End Brands-->
@endsection
