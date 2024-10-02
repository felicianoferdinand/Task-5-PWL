<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';


    protected $fillable = [
        'image_url',
        'name',
        'category_id',
        'supplier_id',
        'price',
        'description',
        'stock'
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Method to get products with their related supplier and category
     */
    public function scopeWithRelations($query)
    {
        return $query->with(['supplier', 'category']);
    }
}
