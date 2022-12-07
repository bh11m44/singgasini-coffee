<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Category;
use App\Product;
use App\User;
// use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = Category::all();
        $users = User::all();
        $products = Product::with('galleries')->inRandomOrder()->take(16)->get();

        return view('pages.home', [
            // 'categories' => $categories,
            'users' => $users,
            'products' => $products,
        ]);
    }

    // public function add(Request $request, $id)
    // {
    //     $data = [
    //         'products_id' => $id,
    //         'users_id' =>Auth::user()->id,
    //     ];

    //     Wishlist::create($data);

    //     return redirect()->route('wishlist');
    // } 
}
