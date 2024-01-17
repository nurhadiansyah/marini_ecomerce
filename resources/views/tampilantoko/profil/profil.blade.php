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
                    <h5 class="card-title">Data Pribadi</h5>
                    {{-- <p>Add <code>.table-borderless</code> for a table without borders.</p> --}}

                    <div class="row">
                        <!-- Column -->
                        {{-- <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                                            class="img-fluid-custom rounded-circle" width="180" height="180" />
                                        <h4 class="card-title m-t-10">{{ $user->nama }}</h4>
                                        <h6 class="card-subtitle">{{ $user->jabatan }}</h6>
                                    </center>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-md-2 col-xlg-2 col-md-2">
                        </div>
                        <div class="col-md-8 col-xlg-8 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Nama Lengkap</label>
                                        <div class="col-md-12">
                                            <p class="form-control form-control-line">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <p class="form-control form-control-line">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">No HP</label>
                                        <div class="col-md-12">
                                            <p class="form-control form-control-line">{{ $user->No_hp }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tanggal Lahir</label>
                                        <div class="col-md-12">
                                            <p class="form-control form-control-line">{{ $user->tgl_lahir }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a class="btn btn-primary sidebar-link waves-effect waves-dark sidebar-link"
                                                href="/user/{{ $user->email }}/edit" aria-expanded="false"><span
                                                    class="hide-menu">Perbarui Profil</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xlg-2 col-md-2">
                        </div>
                        <!-- Column -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection
