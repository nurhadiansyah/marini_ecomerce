@extends('tampilantoko/layout/index')

@section('content')
    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Edit Profil</h1>
        </div>
    </div>


    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pastikan untuk mengisi Data dengan Benar !</h5>
                    {{-- <p>Add <code>.table-borderless</code> for a table without borders.</p> --}}

                    <div class="row">
                        <!-- Column -->
                        {{-- <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="../assets/images/users/5.jpg"
                                            class="rounded-circle" width="150" />
                                        <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                        <h6 class="card-subtitle">{{ $user->jabatan }}</h6>
                                    </center>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-12 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material mx-2" action="/user/{{ $user->email }}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-12">Nama Lengkap</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                    class="form-control form-control-line @error('name') is-invalid @enderror">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-1" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="text" name="email" value="{{ old('email', $user->email) }}"
                                                    class="form-control form-control-line @error('email') is-invalid @enderror"
                                                    id="example-1">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="No_hp" class="col-md-12">No HP</label>
                                            <div class="col-md-12">
                                                <input type="text" name="No_hp" value="{{ old('No_hp', $user->No_hp) }}"
                                                    class="form-control form-control-line @error('No_hp') is-invalid @enderror"
                                                    id="No_hp">
                                                    @error('No_hp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-2" class="col-md-12">Tanggal Lahir</label>
                                            <div class="col-md-12">
                                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $user->tgl_lahir) }}"
                                                    class="form-control form-control-line @error('tgl_lahir') is-invalid @enderror"
                                                    id="example-2">
                                                    @error('tgl_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="foto" class="col-md-12">Foto</label>

                                            <input type="hidden" name="oldFoto" value="{{ $user->foto }}">

                                            @if ($user->foto)
                                                <img src="{{ asset('storage/' . $user->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                            @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                            @endif

                                            <div class="col-md-12">
                                                <input type="file" name="foto"
                                                    class="form-control form-control-line @error('foto') is-invalid @enderror"
                                                    id="foto"  onchange="previewImage()">
                                                    @error('foto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div> --}}


                                        <hr>
                                        <div class="text-muted">
                                            Jika tidak ingin mengganti password, silahkan lewati <span class="text-warning">Inputan Password Baru</span> dibawah.
                                        </div>
                                        <input type="hidden" name="password" value="{{ $user->password }}">
                                        <div class="form-group">
                                            <label class="col-md-12">Password Baru</label>
                                            <div class="col-md-12">
                                                <input type="password" name="passwordBaru"
                                                    class="form-control form-control-line @error('passwordBaru') is-invalid @enderror">
                                                    @error('passwordBaru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Ulangi Password Baru</label>
                                            <div class="col-md-12">
                                                <input type="password" name="konfirPasswordBaru"
                                                    class="form-control form-control-line @error('konfirPasswordBaru') is-invalid @enderror">
                                                    @error('konfirPasswordBaru')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <hr>




                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success text-white">Perbarui Profil</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection
