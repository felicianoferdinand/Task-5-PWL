<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    public function product()
    {
        // Foreign key is id_products, and it references the id column in the Product model
        return $this->belongsTo(Product::class, 'id_products', 'product_id');
    }

    // Access the category through the Product relationship
    public function category()
    {
        return $this->hasOneThrough(Category::class, Product::class, 'id', 'id', 'id_products', 'category_id');
    }
}
