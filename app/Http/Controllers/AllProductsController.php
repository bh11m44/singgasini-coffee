<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
// use App\Category;
use App\User;

class AllProductsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $users = User::all();
            $products = Product::where('nama', 'LIKE', '%'. $request->cari .'%')
                        ->orWhere('harga', 'LIKE', '%'. $request->cari .'%')->with('galleries')->inRandomOrder()->paginate(32);
        } else {
            $users = User::all();
            $products = Product::with('galleries')->inRandomOrder()->paginate(32);
        }

        return view('pages.all-products', [
            // 'categories' => $categories,
            'users' => $users,
            'products' => $products,
        ]);
    }
}
