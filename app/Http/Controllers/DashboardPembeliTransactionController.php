<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;
// use App\Review;

class DashboardPembeliTransactionController extends Controller
{
    public function index()
    {
        $buyTransaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->whereHas('transaction', function($transaction) {
                            $transaction->where('users_id', Auth::user()->id);
                        })->get();

        return view('pages.dashboard-pembeli-transactions', [
            'buytransactions' => $buyTransaction
        ]);
    }

    public function details(Request $request, $id)
    {   
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
                        ->findOrFail($id);

        return view('pages.dashboard-pembeli-transactions-details', [
            'transactions' => $transaction,
        ]);
    }

    // public function addRating(Request $request, $id)
    // {
        
    //     $data = $request->all();
    //     $item = Product::findOrFail($id);
    //     $data['rating'] = $request->nilai_rating;
    //     $item->update($data);
        
    //     return redirect()->back()->with('Berhasil', 'Rating Berhasil Ditambahkan');
    // }

    // public function addReview(Request $request, $id)
    // {        
    //     $request->request->add(['users_id' => auth()->user()->id]);
    //     $review = Review::create($request->all());
    //     return redirect()->back()->with('Berhasil', 'Review Berhasil Ditambahkan');
    // }
}
