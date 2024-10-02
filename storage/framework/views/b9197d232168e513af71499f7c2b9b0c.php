<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Supplier List</h3>
                    <hr>
                </div>
                <div class="card border-8 shadow-sm rounded">
                    <div class="card-body">
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Alamat Supplier</th>
                                    <th scope="col">PIC Supplier</th>
                                    <th scope="col">No HP PIC Supplier</th>
                                    <th scope="col" style="width: 20%;">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__empty_1 = true; $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <tr>
                                        <td class="text-center align-middle"><?php echo e($supplier->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($supplier->alamat_supplier); ?></td>
                                        <td class="text-center align-middle"><?php echo e($supplier->pic_name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($supplier->no_hp_pic_supplier); ?></td>
                                        <td class="text-center  flex flex-row justify-center align-middle">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" method="POST">
                                                <a href="<?php echo e(route('products.show', $supplier->supplier_id)); ?>" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="<?php echo e(route('products.edit', $supplier->supplier_id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Supplier belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>


                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($suppliers->links('pagination::bootstrap-5')); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: '<?php echo e(session('success')); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php elseif(session('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: '<?php echo e(session('error')); ?>',
                showConfirmButton: false,
                timer: 2000
            });
        <?php endif; ?>
    </script>
</body>
</html>
<?php /**PATH D:\laragon\www\laravelproyek\resources\views/suppliers/index.blade.php ENDPATH**/ ?>