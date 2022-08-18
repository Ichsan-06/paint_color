<?php $__env->startSection('title','Kota'); ?>

<?php $__env->startSection('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Kota</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Kota</li>
        </ol>
        <div class="card mb-4">

            <div class="card-body">
                
                <form action="<?php echo e(route('kota.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Nama Kota">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Kota</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamppz\htdocs\laravel8\Project\Topek\resources\views/kota/create.blade.php ENDPATH**/ ?>