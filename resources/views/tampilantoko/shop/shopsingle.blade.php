@extends('tampilantoko/layout/index')

@section('content')
 <!-- Open Content -->
 <section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset('storage/' . $shop->gambar) }}" alt="Card image cap" id="product-detail">
                </div>

            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{$shop->nama_barang}}</h1>
                        <p class="h3 py-2">@currency($shop->harga)</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Kategori:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$shop->kategori->nama_kat}}</strong></p>
                            </li>
                        </ul>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Jumlah Barang Tersedia:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$shop->kuantitas}}</strong></p>
                            </li>
                        </ul>

                        <h6>Deskripsi</h6>
                        <p>ini adalah sis deskripsi</p>

                        <form action="/keranjang" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="product-title" value="Activewear"> --}}
                            <div class="row">
                                <input type="hidden" name="harga" value="{{$shop->harga}}">
                                <input type="hidden" name="barang_id" value="{{$shop->id}}">
                                @if (auth()->user())
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                @endif
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="jumlah" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                {{-- <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" name="submit">Beli</button>
                                </div> --}}
                                @auth
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit">Tambah ke keranjang</button>
                                </div>
                                @else
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-danger btn-lg" name="submit">Login Terlebih Dahulu</button>
                                </div>
                                @endauth
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->


@endsection
