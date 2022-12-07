<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\User;
// use App\Wishlist;
// use App\Review;
// use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        // $categories = Category::all();
        $users = User::all();
        // $reviews = Review::all();
        $products = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();

        return view('pages.product-details', [
            'product' => $products,
            // 'categories' => $categories,
            'users' => $users,
            // 'reviews' => $reviews,
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $data = [
            'products_id' => $id,
            'users_id' =>Auth::user()->id,
            'harga' => $product->harga,
            'kuantitas' => $request->qty,
            'total_harga' => $request->qty * $product->harga,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
    
    // public function addWishlist(Request $request, $id)
    // {
    //     $data = [
    //         'products_id' => $id,
    //         'users_id' =>Auth::user()->id,
    //     ];

    //     Wishlist::create($data);

    //     return redirect()->route('wishlist');
    // } 

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
    //     // dd($request->all());
        
    //     $request->request->add(['users_id' => auth()->user()->id]);
    //     $review = Review::create($request->all());
    //     return redirect()->back()->with('Berhasil', 'Review Berhasil Ditambahkan');
    // }
}
