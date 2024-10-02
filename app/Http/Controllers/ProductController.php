<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // Jangan lupa untuk mengimpor model Product
use App\Models\Supplier;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request; //Tambahkan kode ini pada file ProductController
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::withRelations()->paginate(10);

        return view('products.index', compact('products'));
    }
    public function create(): View
    {
        $category= Category::get();
        $suppliers = Supplier::get();
        $data['categories'] = $category;
        $data['suppliers_'] = $suppliers;
        // $data['categories']
        return view('products.create', compact('data'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:5',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('images', $fileName, 'public');

            $data = Product::create([
                'image_url' => 'storage/images/' . $fileName,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
            $data->save();


            return redirect()->route('products.index')->with(['success' => 'Product successfully added']);
        }

        return redirect()->route('products.index')->with(['error' => 'Failed to upload image']);
    }
}
