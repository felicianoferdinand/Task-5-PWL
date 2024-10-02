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
                    <h3 class="text-center my-4">Product List</h3>
                    <hr>
                </div>
                <div class="card border-8 shadow-sm rounded">
                    <div class="card-body">
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col" style="width: 20%;">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <tr>
                                        <td class="text-center">
                                            <img src="<?php echo e($product->image_url); ?>" class="rounded" style="width: 150px">
                                        </td>
                                        <td class="text-center align-middle"><?php echo e($product->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($product->category->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($product->supplier->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e("Rp " . number_format($product->price, 2, ',', '.')); ?></td>
                                        <td class="text-center align-middle"><?php echo e($product->stock); ?></td>
                                        <td class="text-center  flex flex-row justify-center align-middle">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" method="POST">
                                                <a href="<?php echo e(route('products.show', $product->product_id)); ?>" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="<?php echo e(route('products.edit', $product->product_id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
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
                                                Data Products belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>


                    </div>
                    <div class="d-flex justify-content-center">
                        <?php echo e($products->links('pagination::bootstrap-5')); ?>

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
<?php /**PATH D:\laragon\www\laravelproyek\resources\views/products/index.blade.php ENDPATH**/ ?>