<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;
class SupplierController extends Controller
{
     /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }
}
