<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPembeliSettingController extends Controller
{
   public function account()
    {
        $user = Auth::user();
        

        return view('pages.dashboard-pembeli-account', [
            'users' => $user,
        
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/product', 'public');
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
