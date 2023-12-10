@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="container">
            <form action="Get">
                @csrf
                @foreach($keranjangs as $keranjang)
                <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          <div class="row">
                            <div class="col">
                                <span>Nama Barang   :{{ $keranjang->barang->nama_barang}}</span>
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
                @endforeach
            </form>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    
    <!--End Brands-->
@endsection