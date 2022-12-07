<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
// use App\Category;

class StoreDetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::all();
        // if($request->has('cari')){
        //     // $categories = Category::all();
        //     $users = User::where('name', 'LIKE', '%'. $request->cari .'%');
        //     // $categories = Category::where('nama', 'LIKE', '%'. $request->cari .'%' )->get();
        //     // $users = User::where('nama_toko', 'LIKE', '%'. $request->cari .'%')->get();
        //     // $products = Product::where('nama', 'LIKE', '%'. $request->cari .'%')
        //     //             ->orWhere('harga', 'LIKE', '%'. $request->cari .'%')
        //     //             ->orWhere('satuan', 'LIKE', '%'. $request->cari .'%')->with('galleries')->inRandomOrder()->paginate(32);
        // } else {
        //     // $categories = Category::all();
        //     $users = User::all();
        //     // $products = Product::with('galleries')->inRandomOrder()->paginate(32);
        // }

        return view('pages.all-store', [
            // 'categories' => $categories,
            'users' => $users,
            // 'products' => $products,
        ]);

        // return view('pages.all-store');
    }

    public function detail(Request $request, $id)
    {
        $user = User::with(['product'])->where('id', $id)->firstOrFail();
        // $user = User::all();
        $product = Product::where('users_id', $id)->get();

        return view('pages.store-details', [
            'users' => $user,
            'products' => $product,
        ]);
    }
}
