<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class DashboardAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = User::count();
        $Pendapatan = Transaction::sum('total_harga');
        $Transaksi = Transaction::count();

        return view('pages.admin.dashboard-admin', [
            'Customer' => $customer,
            'Pendapatan' => $Pendapatan,
            'Transaksi' => $Transaksi
        ]);
    }
}
