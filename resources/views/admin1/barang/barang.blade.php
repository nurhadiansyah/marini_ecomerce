@extends('admin1.layout.index')

@section('contentadmin')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Barang</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body p-2">

                            <!-- Basic Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Tambah Data
                            </button>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <form method="POST" action="/barang" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="terjual" value="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="nama_barang" class="form-label">Nama barang</label>
                                                            <input name="nama_barang" type="text" class="form-control"
                                                                id="nama_barang">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="kuantitas" class="form-label">Jumlah Barang</label>
                                                            <input name="kuantitas" type="text" class="form-control"
                                                                id="kuantitas">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="harga" class="form-label">Harga barang</label>
                                                            <input name="harga" type="text" class="form-control"
                                                                id="harga">
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-md-12">
                                                            <label class="form-label" for="kategori_id">kategori</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="kategori_id"
                                                                    required>
                                                                    <option selected="selected" class="text-grey">
                                                                        <span>--kategori--</span></option>
                                                                    @foreach ($data as $datas)
                                                                        <option style="text-transform: capitalize"
                                                                            value="{{ $datas->id }}">
                                                                            {{ $datas->nama_kat }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row md-12">
                                                        <label for="gambar" class="form-label">Upload foto</label>
                                                        <img class="img-preview img-fluid">
                                                        <div class="col-md-12">
                                                            <input name="gambar" class="form-control" type="file"
                                                                id="gambar" onchange="previewImage()">
                                                        </div>
                                                        <span class="fs-12 fst-italic">*noted:upload gambar</span>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div><!-- End Basic Modal-->
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Terjual</th>
                                        <th scope="col">kategori barang</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1;
                                    @endphp
                                    @foreach ($barangs as $barang)
                                        {{-- @foreach ($satas as $sata) --}}

                                        <tr>
                                            <td>{{ $no ++}}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>RP.{{ $barang->harga }}</td>
                                            <td>{{ $barang->kuantitas }}</td>
                                            <td>{{ $barang->terjual }}</td>
                                            {{-- <td>{{ $barang->kategori()->nama_kat}} </td> --}}
                                            <td>{{ $barang->kategori->nama_kat }} </td>

                                            <td>
                                                <div style="max-width:150px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <div class="row">
                                                    {{-- button delete --}}
                                                    <div class="col-md-4">
                                                        <form action="/barang/{{ $barang->id }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <div class="btn-group">
                                                                <button class="btn btn-danger" type="submit"
                                                                    onclick="return confirm('Yakin ingin menghapus data?')"
                                                                    data-toggle="tooltip" title="Hapus">
                                                                    <i class="bi bi-trash"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    {{-- modal Edit --}}
                                                    <div class="row">
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#largeModal{{ $barang->id }}">
                                                            <i class="bi bi-pencil-square"></i></button>
                                                        {{-- modal edit --}}
                                                        <div class="modal fade" id="largeModal{{ $barang->id }}"
                                                            tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Large Modal</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <form method="POST"
                                                                                action="/barang/{{ $barang->id }}"
                                                                                enctype="multipart/form-data">
                                                                                @method('PUT')
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label for="nama_barang"
                                                                                            class="form-label">Nama
                                                                                            barang</label>
                                                                                        <input name="nama_barang"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="nama_barang"
                                                                                            value="{{ $barang->nama_barang }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label for="kuantitas"
                                                                                            class="form-label">Jumlah
                                                                                            Barang</label>
                                                                                        <input name="kuantitas"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="kuantitas"
                                                                                            value="{{ $barang->kuantitas }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label for="harga"
                                                                                            class="form-label">Harga
                                                                                            barang</label>
                                                                                        <input name="harga"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            id="harga"
                                                                                            value="{{ $barang->harga }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row ">
                                                                                    <div class="col-md-12">
                                                                                        <label class="form-label"
                                                                                            for="kategori_id">kategori</label>
                                                                                        <div class="col-sm-12">
                                                                                            <select class="form-select"
                                                                                                aria-label="Default select example"
                                                                                                name="kategori_id"
                                                                                                required>
                                                                                                <option selected="selected"
                                                                                                    class="text-grey"
                                                                                                    value="{{ $barang->kategori_id }}">
                                                                                                    {{ $datas->nama_kat }}
                                                                                                </option>
                                                                                                @foreach ($data as $datas)
                                                                                                    <option
                                                                                                        style="text-transform: capitalize"
                                                                                                        value="{{ $datas->id }}">
                                                                                                        {{ $datas->nama_kat }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row md-12">
                                                                                    <label for="gambar"
                                                                                        class="form-label">Upload
                                                                                        foto</label>
                                                                                    <input type="hidden" name="oldImage"
                                                                                        value="{{ $barang->gambar }}">
                                                                                    @if ($barang->gambar)
                                                                                        <img src="{{ asset('storage/' . $barang->gambar) }}"
                                                                                            class="img-preview img-fluid img-fluid mb-3 col-sm-5 d-block">
                                                                                    @else
                                                                                        <img
                                                                                            class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                                                    @endif
                                                                                    <input name="gambar"
                                                                                        class="form-control col-md-12"
                                                                                        type="file" id="gambar"
                                                                                        onchange="previewImage()"
                                                                                        value="{{ $barang->gambar }}">

                                                                                    <span
                                                                                        class="fs-12 fst-italic">*noted:upload
                                                                                        gambar</span>
                                                                                </div>
                                                                                <div class="text-center">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Submit</button>
                                                                                    <button type="reset"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- modal end --}}

                                                        {{-- tambah barang --}}
                                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah{{$barang->id}}">
                          <i class="bi bi-clipboard-plus"></i></button> --}}

                                                        {{-- <div class="modal fade" id="modaltambah{{ $barang->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Large Modal</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                      @method('PUT')
                                      @csrf
                                      <div class="row">
                                        <div class="col-md-12">
                                          <label for="jumlah1" class="form-label">tambah jumlah barang</label>
                                          <input name="jumlah1" type="text" class="form-control" id="jumlah1" value="{{$barang->kuantitas}}">
                                        </div>
                                      </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                  </form>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div> --}}

                                                        {{-- end tambah barang --}}
                                                    </div>
                                                </div>
                                                </div>
                                                {{-- tambah barang --}}
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#Tambahbarang{{ $barang->id }}">
                                                        <i class="bi bi-plus-square"></i></button>
                                                    {{-- modal edit --}}
                                                    <div class="modal fade" id="Tambahbarang{{ $barang->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Large Modal</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <form method="POST" action="/tambahbarang">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label for="tambahbarang"
                                                                                        class="form-label">Tambah Jumlah
                                                                                        barang</label>
                                                                                    <input name="kuantitas" type="text"
                                                                                        class="form-control"
                                                                                        id="kuantitas">
                                                                                    <input name="id" type="hidden"
                                                                                        class="form-control"
                                                                                        id="id"
                                                                                        value="{{ $barang->id }}">
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="text-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Submit</button>
                                                                                <button type="reset"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        {{-- Modal Edit --}}

                                        {{-- @endforeach --}}
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
