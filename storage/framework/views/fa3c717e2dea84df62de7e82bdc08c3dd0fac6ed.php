
<!-- START FORM -->
<?php $__env->startSection('konten'); ?>

 <form action='<?php echo e(url('bengkel')); ?>' method='post'>
    <?php echo csrf_field(); ?> 
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='<?php echo e(url('bengkel')); ?>' class="btn btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="<?php echo e(Session::get('id')); ?>" name='id' id="id">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='kode_barang' value="<?php echo e(Session::get('kode_barang')); ?>" id="kode_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_barang' value="<?php echo e(Session::get('nama_barang')); ?>" id="nama_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' value="<?php echo e(Session::get('deskripsi')); ?>" id="deskripsi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok_barang" class="col-sm-2 col-form-label">Stok Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='stok_barang' value="<?php echo e(Session::get('stok_barang')); ?>" id="stok_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='harga_barang' value="<?php echo e(Session::get('harga_barang')); ?>" id="harga_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_barang" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\uts\resources\views/bengkel/create.blade.php ENDPATH**/ ?>