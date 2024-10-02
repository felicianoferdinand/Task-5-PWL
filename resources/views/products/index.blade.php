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
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>

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

                                @forelse ($products as $product )

                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $product->image_url }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td class="text-center align-middle">{{ $product->name }}</td>
                                        <td class="text-center align-middle">{{ $product->category->name }}</td>
                                        <td class="text-center align-middle">{{ $product->supplier->name }}</td>
                                        <td class="text-center align-middle">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</td>
                                        <td class="text-center align-middle">{{ $product->stock }}</td>
                                        <td class="text-center  flex flex-row justify-center align-middle">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" method="POST">
                                                <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Products belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
