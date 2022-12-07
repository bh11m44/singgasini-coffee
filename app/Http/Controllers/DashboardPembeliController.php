<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TransactionDetail;
use App\User;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardPembeliController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('transaction', function($transaction) {
                            $transaction->where('users_id', Auth::user()->id);
                        });
        
        $buyTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('transaction', function($transaction) {
                            $transaction->where('users_id', Auth::user()->id);
                        })->latest()->get();
        
        
        $trsc = Transaction::with(['user'])->where('users_id', Auth::user()->id)->get();
        $pengeluaran = $trsc->reduce(function($carry, $item) {
            return $carry + $item->total_harga;
        });

        return view('pages.dashboard-pembeli', [
            'transaction_count' => $transaction->count(),
            'pengeluaran' => $pengeluaran,
            'buytransactions' => $buyTransaction
        ]);
    }
}
