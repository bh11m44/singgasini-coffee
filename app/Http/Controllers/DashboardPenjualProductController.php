<?php

namespace App\Http\Controllers;

// use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPenjualProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['galleries'])->where('users_id', Auth::user()->id)->get();

        return view('pages.dashboard-penjual-products', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $id)
    {
        $product = Product::with((['galleries', 'user']))->findOrFail($id);
        // $categories = Category::all();

        return view('pages.dashboard-penjual-products-details', [
            'products' => $product,
            // 'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-penjual-product-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-penjual-product-details', $item->products_id);
    }

    public function create()
    {
        // $categories = Category::all();

        return view('pages.dashboard-penjual-products-create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug(Str::random(50));
        // $data['rating'] = 0;

        $product = Product::create($data);

        $gallery = [
            'products_id'=> $product->id,
            'foto'=> $request->file('foto')->store('assets/product', 'public'),
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-penjual-product');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id); 

        $data['slug'] = Str::slug($request->nama);

        $item->update($data);
        return redirect()->route('dashboard-penjual-product');
    }

    public function delete(Request $request, $id)
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect()->route('dashboard-penjual-product');
    }
}
