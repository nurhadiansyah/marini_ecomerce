

<?php $__env->startSection('contentadmin'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Kategori</h1>
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
            <div class="card-body p-2">

          <!-- Basic Modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Tambah Data Modal
          </button>
          <div class="modal fade" id="basicModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah kategory</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <form method="POST" action="/kategori" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-12">
                      <label for="nama_kat" class="form-label">Nama kategory</label>
                      <input name="nama_kat" type="text" class="form-control" id="nama_kat">
                    </div>
                  </div>
                    <div class="row md-12">
                      <label for="gambar" class="form-label">Upload foto</label>
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
                  <?php $no = 1; ?>
                  <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($no ++); ?></td>
                    <td><?php echo e($data->nama_kat); ?></td>
                      <td>
                        <div style="max-width:150px; overflow:hidden;">
                          <img src="<?php echo e(asset('storage/' . $data->gambar)); ?>" alt="" class="img-fluid">
                        </div>
                         
                      </td>
                      <td style="text-align: center;">
                      <div class="row ">
                          
                        <div class="col-md-2">
                          <form action="/kategori/<?php echo e($data->id); ?>" method="post">
                              <?php echo method_field('DELETE'); ?>
                              <?php echo csrf_field(); ?>
                              <div class="btn-group">
                                  <button class="btn btn-danger" type="submit" 
                                  onclick="return confirm('Yakin ingin menghapus data?')" 
                                  data-toggle="tooltip" title="Hapus">
                                  <i class="bi bi-trash"></i></button>
                              </div>
                          </form>
                        </div>
                          
                          
                          <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?php echo e($data->id); ?>">
                                      
                              <i class="bi bi-pencil-square"></i>
                              </button>
                              
                              <div class="modal fade" id="largeModal<?php echo e($data->id); ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Large Modal</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <form method="POST" action="/kategori/<?php echo e($data->id); ?>" enctype="multipart/form-data">
                                          <?php echo method_field('PUT'); ?>
                                          <?php echo csrf_field(); ?>
                                            <div class="row">
                                              <div class="col-md-12">
                                              <label for="nama_kat" class="form-label">Nama kategory</label>
                                              <input name="nama_kat" type="text" class="form-control" id="nama_kat" value="<?php echo e($data->nama_kat); ?>">
                                              </div>
                                            </div>
                                            <div class="row md-12">
                                              <label for="gambar" class="form-label">Upload foto</label>
                                              <input type="hidden" name="oldImage" value="<?php echo e($data->gambar); ?>">
                                              <?php if($data->gambar): ?>
                                                  <img src="<?php echo e(asset('storage/'.$data->gambar)); ?>" class="img-preview img-fluid d-block">
                                              <?php else: ?> 
                                                <img class="img-preview img-fluid">
                                              <?php endif; ?>
                                              
                                              <input name="gambar" class="form-control col-md-12" type="file" id="gambar" onchange="previewImage()" value="<?php echo e($data->gambar); ?>">
                                              
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
                              
                              
                          </div>
                        </div>
                        
                      </td>
                      
                      
                  </tr>
                  

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin1.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/admin1/kategori/kategory.blade.php ENDPATH**/ ?>