@extends('admin1.layout.index')

@section('contentadmin')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($users as $data)
                  <tr>
                  <td>{{$no ++}}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->level }}</td>
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
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="text" class="form-control" id="email" value="{{ $data->email }}">
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <label for="level">Level</label>
                                            <select class="form-select " id="level" aria-label="Floating label select example">
                                              
                                              <option selected value="{{ $data->level }}" >{{ $data->level }}</option>
                                              <option value="1">Admin</option>
                                              <option value="0">User</option>
                                              
                                            </select>
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
                            </div>
                            
                            {{--modal end--}}
                        </div>
                      </div>
                      
                    </td>
                  </tr>
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