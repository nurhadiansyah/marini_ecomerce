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
                  <h5 class="card-title">Status Tranksaksi</h5>
                  {{-- <p>Add <code>.table-borderless</code> for a table without borders.</p> --}}
                  <!-- Active Table -->
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Age</th>
                        <th scope="col">Start Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Brandon Jacob</td>
                        <td>Designer</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Tables without borders -->
    
                </div>
              </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection