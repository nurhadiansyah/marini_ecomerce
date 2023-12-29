

<?php $__env->startSection('content'); ?>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="container">
            <form action="/transaksi" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                <input type="hidden" name="status" value="Pending">

                <?php
                    $i = 1;
                ?>
                <?php $__currentLoopData = $keranjangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keranjang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                
                <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="form-check">
                        <input class="form-check-input" name="keranjang_id[]" value="<?php echo e($keranjang->id); ?>" type="checkbox" id="gridCheck<?php echo e($keranjang->id); ?>">
                        <label class="form-check-label" for="gridCheck<?php echo e($keranjang->id); ?>">
                          <div class="row">
                            <div class="col">
                                <span>Nama Barang    :<?php echo e($keranjang->barang->nama_barang); ?></span>
                            </div>

                            <br>
                            <span>Jumlah barang     :<?php echo e($keranjang->jumlah); ?></span>
                            <br>
                            <span class="col">Total harga   :<?php echo e($keranjang->total); ?></span>
                            <div style="max-width:150px; overflow:hidden;" class="col rounded float-end">
                                <img src="<?php echo e(asset('storage/' . $keranjang->barang->gambar)); ?>" alt="" class="img-fluid">
                            </div>
                          </div>
                        </label>
                    </div>
                </div>
                <?php
                    $i++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a href="http://masuk<?php echo e($keranjang->total); ?>">coba</a>
                <button type="submit">Checkout</button>
            </form>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->

    <!--End Brands-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tampilantoko/layout/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/tampilantoko/keranjang/keranjang.blade.php ENDPATH**/ ?>