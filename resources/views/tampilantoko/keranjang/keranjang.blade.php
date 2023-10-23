@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="container">
            <form action="Get">
                @csrf
                @foreach($keranjangs as $keranjang)
                <div class="row mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                          <div>
                            <span>{{ $keranjang->total }}</span>
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