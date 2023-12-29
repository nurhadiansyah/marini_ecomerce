

<?php $__env->startSection('content'); ?>
 <!-- Open Content -->
 <section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?php echo e(asset('storage/' . $shop->gambar)); ?>" alt="Card image cap" id="product-detail">
                </div>
               
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?php echo e($shop->nama_barang); ?></h1>
                        <p class="h3 py-2">RP.<?php echo e($shop->harga); ?></p>
                        
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Kategori:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?php echo e($shop->kategori_id); ?></strong></p>
                            </li>
                        </ul>

                        <h6>Deskripsi</h6>
                        <p>ini adalah sis deskripsi</p>

                        <form action="/keranjang" method="POST">
                            <?php echo csrf_field(); ?>
                            
                            <div class="row">
                                <input type="hidden" name="harga" value="<?php echo e($shop->harga); ?>">
                                <input type="hidden" name="barang_id" value="<?php echo e($shop->id); ?>">
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="jumlah" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-success btn-lg" name="submit">Beli</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit">Tambah ke keranjang</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('tampilantoko/layout/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\marini\cahaya_marini\resources\views/tampilantoko/shop/shopsingle.blade.php ENDPATH**/ ?>