<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Transaction;
use App\TransactionDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_harga'));

        $code = 'SinggaSini-' . mt_rand(0000, 9999);
        $carts = Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->get();

        $transaction = Transaction::create([
            'users_id' =>  Auth::user()->id,
            'total_harga' =>  $request->total_harga,
            'code' =>  $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'SinggaSini-' . mt_rand(0000, 9999);

            TransactionDetail::create([
                'transactions_id' =>  $transaction->id,
                'products_id' =>  $cart->product->id,
                'kuantitas' =>  $cart->kuantitas,
                'harga' =>  $cart->product->harga,
                'status' =>  'Menunggu Konfirmasi',
                'code' =>  $trx,
            ]);

            $coba = array('id' => $cart->product->id);
            $stk = Product::where($coba)->first();
            $stk->update(['stok' => $stk->stok - $cart->kuantitas]);
        }

        Cart::with(['product', 'user'])->where('users_id', Auth::user()->id)->delete();

        return view('pages.success');
    }

    public function callback(Request $request)
    {
        
    }
}
