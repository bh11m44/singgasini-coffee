<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class DashboardPenjualTransactionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('product', function($product) {
                            $product->where('users_id', Auth::user()->id);
                        })->get();
        
        // $buyTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
        //                 ->whereHas('transaction', function($transaction) {
        //                     $transaction->where('users_id', Auth::user()->id);
        //                 })->get();

        return view('pages.dashboard-penjual-transactions', [
            'selltransactions' => $sellTransaction
        ]);
    }

    public function details(Request $request, $id)
    {   
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->findOrFail($id);

        return view('pages.dashboard-penjual-transactions-details', [
            'transactions' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id); 

        $item->update($data);

        return redirect()->back();
    }
}
