

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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">form tambah kategori</h5>
              <div>
                <form class="row g-3">
                  <div class="col-md-12">
                    <label for="inputName5" class="form-label">Nama kategory</label>
                    <input type="text" class="form-control" id="nama_kat">
                  </div>
                  <div class="row mb-6">
                    <label for="inputNumber" class="form-label">Upload foto</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="gambar">
                    </div>
                    <span class="fs-12 fst-italic">*noted:upload gambar</span>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                    
                  </div>
                </form><!-- End Multi Columns Form -->
              </div>
            </div>
          </div>
    </section>

  </main><!-- End #main -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin1.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/admin1/kategori/createkategory.blade.php ENDPATH**/ ?>