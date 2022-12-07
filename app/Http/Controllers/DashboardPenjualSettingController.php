<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Category;
use Illuminate\Support\Facades\Auth;

class DashboardPenjualSettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        $user = Auth::user();
        // $categories = Category::all();

        return view('pages.dashboard-penjual-store', [
            'users' => $user,
            // 'categories' => $categories
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        

        return view('pages.dashboard-penjual-account', [
            'users' => $user,
        
        ]);
    }

    public function updateAccount(Request $request, $redirect)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/product', 'public');
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }

    public function updateStore(Request $request, $redirect)
    {
        $data = $request->all();

        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
