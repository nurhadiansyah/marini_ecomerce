@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="font-weight-bold collapsed d-flex justify-content-between h2 text-bld text-decoration-none"
                            href="#">
                            Kategori
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="/Shop">Semua</a></li>
                            @foreach ($kategoris as $data)
                                <li><a class="text-decoration-none"
                                        href="/ShopKategori/{{ $data->id }}">{{ $data->nama_kat }}</a></li>
                            @endforeach


                        </ul>
                    </li>
                </ul>

            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        @if (isset ($kateg))
                        <span class="text-decoration-none">{{ $kateg->nama_kat }}</span>
                        @else
                            <span class="text-decoration-none">Semua</span>
                        @endif
                    </div>
                    <div class="col-md-6 pb-2">
                        <div class="d-flex">
                            <form action="/Shop">
                                <div class="input-group mb-6">
                                    <input type="text" class="form-control" placeholder="Cari" name="search">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- baris barang --}}
                <div class="row">
                    @if ($barangs->isEmpty())
                        <div class="col-md-4">
                            <div class="align-items-center">
                                Barang Tidak Ditemukan
                            </div>
                        </div>
                    @else

                        @foreach ($barangs as $barang)

                            <div class="col-md-4">
                                <div class="card mb-4 product-wap rounded-0">
                                    <div class="card rounded-0">
                                        <img class="card-img rounded-0 img-fluid-custom"
                                            src="{{ asset('storage/' . $barang->gambar) }}">
                                        <div
                                            class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                {{-- <li><a class="btn btn-success text-white" href=""><i class="far fa-heart"></i></a></li> --}}
                                                @if ($barang->kuantitas < 1)
                                                    <li><a class="btn btn-success text-white mt-2" href="#"><i
                                                                class="far fa-eye"></i></a></li>
                                                @else
                                                    <li><a class="btn btn-success text-white mt-2"
                                                            href="/Shop/{{ $barang->id }}"><i class="far fa-eye"></i></a></li>
                                                @endif
                                                {{-- <li><a class="btn btn-success text-white mt-2" href="/shop/{{$barang->id}}"><i class="fas fa-cart-plus"></i></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <a href="/shop/{{ $barang->id }}"
                                            class="h3 text-decoration-none">{{ $barang->nama_barang }}</a>
                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                            <li>
                                                @if ($barang->kuantitas < 1)
                                                    Stok Habis
                                                @else
                                                    Stok = {{ $barang->kuantitas }}
                                                @endif
                                            </li>
                                            <li class="pt-2">
                                                <span
                                                    class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                <span
                                                    class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                            </li>
                                        </ul>

                                        <p class="text-center mb-0">@currency($barang->harga)</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif



                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->


@endsection
