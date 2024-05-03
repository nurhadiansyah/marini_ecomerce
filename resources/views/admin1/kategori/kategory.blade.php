@extends('admin1.layout.index')

@section('contentadmin')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Kategori</h1>
      <nav>
        
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body p-2">

          <!-- Basic Modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Tambah Data
          </button>
          <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah kategori</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <form method="POST" action="/kategori" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="col-md-12">
                      <label for="nama_kat" class="form-label">Nama Kategori</label>
                      <input name="nama_kat" type="text" class="form-control" id="nama_kat">
                    </div>
                  </div>
                    <div class="row md-12">
                      <label for="gambar" class="form-label">Upload Foto</label>
                      <img class="img-preview img-fluid">
                      <div class="col-md-12">
                        <input name="gambar" class="form-control" type="file" id="gambar" onchange="previewImage()">
                      </div>
                      <span class="fs-12 fst-italic">*noted:upload gambar</span>
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
          </div><!-- End Basic Modal-->
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($kategoris as $data)
                  <tr>
                    <td>{{$no ++}}</td>
                    <td>{{ $data->nama_kat }}</td>
                      <td>
                        <div style="max-width:150px; overflow:hidden;">
                          <img src="{{ asset('storage/' . $data->gambar) }}" alt="" class="img-fluid">
                        </div>

                      </td>
                      <td style="text-align: center;">
                      <div class="row ">
                          {{-- button delete --}}
                        <div class="col-md-2">
                          <form action="/kategori/{{$data->id}}" method="post">
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
                          <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal{{ $data->id }}">

                              <i class="bi bi-pencil-square"></i>
                              </button>
                              {{-- modal edit --}}
                              <div class="modal fade" id="largeModal{{ $data->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Large Modal</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <form method="POST" action="/kategori/{{ $data->id }}" enctype="multipart/form-data">
                                          @method('PUT')
                                          @csrf
                                            <div class="row">
                                              <div class="col-md-12">
                                              <label for="nama_kat" class="form-label">Nama Kategori</label>
                                              <input name="nama_kat" type="text" class="form-control" id="nama_kat" value="{{ $data->nama_kat }}">
                                              </div>
                                            </div>
                                            <div class="row md-12">
                                              <label for="gambar" class="form-label">Upload Foto</label>
                                              <input type="hidden" name="oldImage" value="{{$data->gambar}}">
                                              @if($data->gambar)
                                                  <img src="{{asset('storage/'.$data->gambar)}}" class="img-preview img-fluid d-block">
                                              @else
                                                <img class="img-preview img-fluid">
                                              @endif

                                              <input name="gambar" class="form-control col-md-12" type="file" id="gambar" onchange="previewImage()" value="{{ $data->gambar }}">

                                              <span class="fs-12 fst-italic">*noted:upload gambar</span>
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
                              </div>

                              {{--modal end--}}
                          </div>
                        </div>

                      </td>


                  </tr>
                  {{-- Modal Edit --}}

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

<script>
  function previewImage() {
    const image = document.querySelector('#gambar');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection
