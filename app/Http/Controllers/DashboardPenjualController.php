<?php

namespace App\Http\Controllers;

// use App\Category;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use App\TransactionDetail;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardPenjualController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('product', function($product) {
                            $product->where('users_id', Auth::user()->id);
                        });

        $sellTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('product', function($product) {
                            $product->where('users_id', Auth::user()->id);
                        })->latest()->get();
        
        $trsc = TransactionDetail::all();
        $pendapatan = $trsc->reduce(function($carry, $item) {
            return $carry + $item->harga * $item->kuantitas;
        });

        return view('pages.dashboard-penjual', [
            'transaction_count' => $transaction->count(),
            'pendapatan' => $pendapatan,
            'selltransactions' => $sellTransaction
        ]);
    }

    public function panduan()
    {
        return view('pages.dashboard-penjual-panduan');
    }
}
