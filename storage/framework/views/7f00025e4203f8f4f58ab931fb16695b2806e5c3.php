<?php $__env->startSection('title','Type'); ?>

<?php $__env->startSection('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Type</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Type</li>
        </ol>
        <div class="card mb-4">
            
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo e(route('type.create')); ?>" class="btn btn-primary">Tambah Type</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td width="10"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($t->name); ?></td>
                                <td width="60%">
                                    <a href="<?php echo e(route('type.edit', $t->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="<?php echo e(route('type.destroy', $t->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xamppz\htdocs\laravel8\Project\Topek\resources\views/type/index.blade.php ENDPATH**/ ?>