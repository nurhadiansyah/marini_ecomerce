

<?php $__env->startSection('contentadmin'); ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Barang</h1>
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
          Tambah Data 
        </button>
        <div class="modal fade" id="basicModal" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form method="POST" action="/barang" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="nama_barang" class="form-label">Nama barang</label>
                        <input name="nama_barang" type="text" class="form-control" id="nama_barang">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="kuantitas" class="form-label">Jumlah Barang</label>
                        <input name="kuantitas" type="text" class="form-control" id="kuantitas">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="harga" class="form-label">Harga barang</label>
                        <input name="harga" type="text" class="form-control" id="harga">
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-12">
                      <label class="form-label" for="kategori_id">kategori</label>
                      <div class="col-sm-12">
                        <select class="form-select" aria-label="Default select example" name="kategori_id" required>
                          <option selected="selected" class="text-grey"><span>--kategori--</span></option>
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option style="text-transform: capitalize" value="<?php echo e($datas->id); ?>"><?php echo e($datas->nama_kat); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="row md-12">
                      <label for="gambar" class="form-label">Upload foto</label>
                      <img class="img-preview img-fluid">
                      <div class="col-md-12">
                        <input name="gambar" class="form-control" type="file" id="gambar" onchange="previewImage()">
                      </div>
                      <span class="fs-12 fst-italic">*noted:upload gambar</span>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
            <?php $no = 1;
             ?>
            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            
            <tr>
                <td><?php echo e($no ++); ?></td>
                <td><?php echo e($barang->nama_barang); ?></td>
                <td>RP.<?php echo e($barang->harga); ?></td>
                <td><?php echo e($barang->kuantitas); ?></td>
                <td><?php echo e($barang->terjual); ?></td>
                
                <td><?php echo e($barang->kategori->nama_kat); ?> </td>
                
                <td>
                  <div style="max-width:150px; overflow:hidden;">
                    <img src="<?php echo e(asset('storage/' . $barang->gambar)); ?>" alt="" class="img-fluid">
                  </div>
                </td>
                <td style="text-align: center;">
                <div class="row">
                    
                  <div class="col-md-4">
                    <form action="/barang/<?php echo e($barang->id); ?>" method="post">
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
                    
                    
                    <div class="col-md-3">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?php echo e($barang->id); ?>">
                         <i class="bi bi-pencil-square"></i></button>
                              
                              <div class="modal fade" id="largeModal<?php echo e($barang->id); ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Large Modal</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <form method="POST" action="/barang/<?php echo e($barang->id); ?>" enctype="multipart/form-data">
                                          <?php echo method_field('PUT'); ?>
                                          <?php echo csrf_field(); ?>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label for="nama_barang" class="form-label">Nama barang</label>
                                              <input name="nama_barang" type="text" class="form-control" id="nama_barang" value="<?php echo e($barang->nama_barang); ?>">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label for="kuantitas" class="form-label">Jumlah Barang</label>
                                              <input name="kuantitas" type="text" class="form-control" id="kuantitas" value="<?php echo e($barang->kuantitas); ?>">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label for="harga" class="form-label">Harga barang</label>
                                              <input name="harga" type="text" class="form-control" id="harga" value="<?php echo e($barang->harga); ?>">
                                            </div>
                                          </div>
                                          <div class="row ">
                                            <div class="col-md-12">
                                            <label class="form-label" for="kategori_id">kategori</label>
                                            <div class="col-sm-12">
                                              <select class="form-select" aria-label="Default select example" name="kategori_id" required>
                                                <option selected="selected" class="text-grey" value="<?php echo e($barang->kategori_id); ?>"><?php echo e($datas->nama_kat); ?></option>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option style="text-transform: capitalize" value="<?php echo e($datas->id); ?>"><?php echo e($datas->nama_kat); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </select>
                                            </div>
                                            </div>
                                          </div>
                                            <div class="row md-12">
                                              <label for="gambar" class="form-label">Upload foto</label>
                                                <input type="hidden" name="oldImage" value="<?php echo e($barang->gambar); ?>">
                                                    <?php if($barang->gambar): ?>
                                                        <img src="<?php echo e(asset('storage/'.$barang->gambar)); ?>" class="img-preview img-fluid img-fluid mb-3 col-sm-5 d-block">
                                                    <?php else: ?> 
                                                      <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                    <?php endif; ?>
                                                    <input name="gambar" class="form-control col-md-12" type="file" id="gambar" onchange="previewImage()" value="<?php echo e($barang->gambar); ?>">
                                                    
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
                
                  <div class="col-md-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Tambahbarang<?php echo e($barang->id); ?>">
                      <i class="bi bi-plus-square"></i></button>
                           
                           <div class="modal fade" id="Tambahbarang<?php echo e($barang->id); ?>" tabindex="-1">
                             <div class="modal-dialog modal-lg">
                               <div class="modal-content">
                                 <div class="modal-header">
                                   <h5 class="modal-title">Large Modal</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                   <div class="row">
                                     <form method="POST" action="/tambahbarang">
                                       <?php echo method_field('PUT'); ?>
                                       <?php echo csrf_field(); ?>
                                       <div class="row">
                                         <div class="col-md-12">
                                           <label for="tambahbarang" class="form-label">Tambah Jumlah barang</label>
                                           <input name="kuantitas" type="text" class="form-control" id="kuantitas">
                                           <input name="id" type="hidden" class="form-control" id="id" value="<?php echo e($barang->id); ?>">
                                         </div>
                                       </div>
                                       <br>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin1.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/admin1/barang/barang.blade.php ENDPATH**/ ?>