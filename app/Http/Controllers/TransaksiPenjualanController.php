<?php

namespace App\Http\Controllers;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiPenjualanController extends Controller
{
     /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        $totalTrans=  TransaksiPenjualan::with(['product','product.category'])->paginate(15);
        return view('transaksi_penjualan.index', compact('totalTrans'));
    }
}
