<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'supplier_id';

    /**
     * Define a one-to-many relationship with the Product model.
     * Each supplier can supply multiple products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'supplier_id');
    }
    public function productsWithCategory()
    {
        // This loads products with their respective categories
        return $this->products()->with('category');
    }
}
