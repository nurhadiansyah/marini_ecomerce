@extends('admin1.layout.index')

@section('contentadmin')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Transaksi</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rincian Data Semua Transaksi</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> --}}

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kode Pesanan</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php $no = 1;
                    @endphp
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $no ++}}</td>
                            <td>{{ $transaksi->user->name }}</td>
                            <td>{{ $transaksi->barang?->nama_barang }}</td>
                            <td>{{ $transaksi->kode_pesanan }}</td>
                            <td>{{ $transaksi->tgl_pesan }}</td>
                            <td>{{ $transaksi->tgl_terima }}</td>
                            <td>{{ $transaksi->jumlah }}</td>
                            <td>@currency($transaksi->total)</td>
                            <td>{{ $transaksi->status }}</td>
                            <td><button type="button" class="btn btn-primary bg-gradient-warning mb-3" data-bs-toggle="modal"
                                data-bs-target="#modal-form{{ $transaksi->id }}">Update Status</button>

                            </td>


                        <div class="modal fade" id="modal-form{{ $transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h5 class="">Update Status Transaksi</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form action="/transaksi/{{ $transaksi->id }}" method="POST" role="form text-left">
                                                        @method('put')
                                                        @csrf
                                                        <select name="status" class="form-select" aria-label="Default select example">
                                                            <option selected>Silahkan Pilih Status</option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Acc">Acc</option>
                                                            <option value="Packing">Packing</option>
                                                            <option value="Dikirim">Dikirim</option>
                                                            <option value="Selesai">Selesai</option>
                                                            <option value="Batal">Batal</option>
                                                          </select>
                                                          <input type="text" name="keterangan" class="form-control" placeholder="Tambahkan Keterangan...">
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
