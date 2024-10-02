<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4"> Add New Products</h3>
                    <hr>
                </div>
                <div class="card border-8 shadow-sm rounded">
                    <div class="card-body">
                        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_id">Product Category</label>
                                <select class="form-control" id="category_id" name="category_id" >
                                    <option value="">-- Select Category Product --</option>
                                    @foreach ($data['categories'] as $category )
                                        <option value="{{ $category->category_id}}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="supplier_id">Supplier</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" >
                                    <option value="">-- Select Supplier --</option>
                                    @foreach ($data['suppliers_'] as $supplier )
                                        <option value="{{ $supplier->supplier_id}}">{{ $supplier->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="name" placeholder="Masukkan Judul Product" />
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Masukkan Description Product"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Masukkan Harga Product" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="Masukkan Stock Product" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning">RESET</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
      CKEDITOR.replace('description');
      function resetForm() {
        document.getElementById('productForm').reset();  // Reset form fields

        // Reset CKEditor content
        for (var instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');  // Reset CKEditor instance
        }
      }
    </script>
</body>
</html>
