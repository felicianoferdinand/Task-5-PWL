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
                    <h3 class="text-center my-4">Tutorial Laravel 11</h3>
                    <hr>
                </div>
                <div class="card border-8 shadow-sm rounded">
                    <div class="card-body">
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
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
                                        <img src="<?php echo e(asset('storage/products/'.$product->image)); ?>" class="rounded" style="width: 150px">
                                    </td>
                                    <td><?php echo e($product->title); ?></td>
                                    <td><?php echo e($product->product_category_name); ?></td>
                                    <td><?php echo e("Rp " . number_format($product->price, 2, ',', '.')); ?></td>
                                    <td><?php echo e($product->stock); ?></td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST">
                                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
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

                        <?php echo e($products->links()); ?>

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
<?php /**PATH D:\proyeknew\laravelproyek\resources\views/products/index.blade.php ENDPATH**/ ?>