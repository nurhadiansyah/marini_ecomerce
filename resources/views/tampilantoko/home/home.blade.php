@extends('tampilantoko/layout/index')

@section('content')
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last" >
                        <img class="img-fluid" src="/template/assets/img/gambarnyami.png" alt="" style="height:20em;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Cahaya</b> Wage</h1>
                            <h3 class="h2">Pakan Ternak Berkualitas</h3>
                            <p>
                                Penyedia pakan berkualitas tinggi terlengkap di Kota Sengkang. Kami menyediakan pilihan pakan ternak yang terbaik, dirancang 
                                untuk memenuhi kebutuhan nutrisi khusus. Dengan pilihan pakan yang berkualitas tinggi, mampu memberikan asupan nutrisi terbaik
                                yang dapat meningkatkan performa dan kesehatan ternak. <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank"></a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last" >
                        <img class="img-fluid" src="/template/assets/img/obatnyamii.png" alt="" style="height:20em;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Obat Hewan</h1>
                            {{-- <h3 class="h2">Aliquip ex ea commodo consequat</h3> --}}
                            <p>
                                Dari suplemen nutrisi yang mendukung pertumbuhan hingga obat-obatan resep
                                yang diakui secara luas oleh praktisi hewan terkemuka, toko kami menyediakan
                                berbagai produk yang memenuhi standar keamanan dan kualitas tertinggi. Kami
                                memahami betapa pentingnya kesehatan hewan peliharaan Anda, dan itulah mengapa
                                kami berkomitmen untuk menyediakan produk berkualitas tinggi yang dapat diandalkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last" >
                        <img class="img-fluid" src="/template/assets/img/perlengkapannyami.png" alt="" style="height:20em;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Perlengkapan Ternak</h1>
                            <p>
                                Perlengkapan ternak kami dirancang untuk memudahkan pemilik hewan dalam merawat ternak mereka. Dari peralatan kandang 
                                hingga kebutuhan keseharian, kami menyediakan pilihan terbaik agar Anda dapat memberikan perhatian maksimal terhadap hewan ternak Anda. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Kategori</h1>
            <p>

            </p>
        </div>
    </div>
    <div class="row">
        @foreach ($kategoris as $kategori)
            <div class="col-md-4 p-5 mt-3 text-center ">
                <a href="/Shop"><img src="{{ asset('storage/' . $kategori->gambar) }}" class="rounded-circle  img-fluid-custom border"></a>
                <h5 class="text-center mt-3 mb-3">{{ $kategori->nama_kat }}</h5>
                <p class="text-center"><a href="/ShopKategori/{{ $kategori->id }}" class="btn btn-success">Go Shop</a></p>
            </div>

        @endforeach
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Barang Terlaris</h1>
                <p>
                    Pilihan andalan! Barang terlaris untuk nutrisi dan kebutuhan terbaik hewan kesayangan Anda.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach($barangs as $barang)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $barang->gambar) }}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        {{-- <li><a class="btn btn-success text-white" href=""><i class="far fa-heart"></i></a></li> --}}
                                        <li><a class="btn btn-success text-white mt-2" href="/Shop/{{$barang->id}}"><i class="far fa-eye"></i></a></li>
                                        {{-- <li><a class="btn btn-success text-white mt-2" href="/shop/{{$barang->id}}"><i class="fas fa-cart-plus"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">

                                <a href="/shop/{{$barang->id}}" class="h3 text-decoration-none">{{ $barang->nama_barang }}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>{{ $barang->kategori->nama_kat}}</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                {{-- <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul> --}}
                                <p class="text-center mb-0">@currency($barang->harga)</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</section>
<!-- End Featured Product -->
@endsection
