

<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tampilantoko/layout/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/tampilantoko/contac/contac.blade.php ENDPATH**/ ?>