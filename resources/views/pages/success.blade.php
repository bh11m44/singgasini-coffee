@extends('layouts.success')

@section('title')
    Checkout Success
@endsection

@section('content')
  <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/banner-sc2.jpg" alt="" class="mb-4" style="border-radius: 50px;">
              <h2>
                Transaksi Pembelian Diproses
              </h2>
              <br><br>
              <h4>
                Silahkan Transfer Melalui <p style="color: red;">QRIS OVO</p> Dengan Nominal Yang Sesuai <b style="color: red;">TOTAL BAYAR</b>
                
              </h4>
              <img src="/images/barcode_ovo.jpeg" alt="" style="width: 300px;">
              <br><br>
              <h4>
                Kirim Bukti Transfer QRIS OVO ke <p style="color: red;">NO : 085852538020 & Nama Pemesan</p> 
              </h4>
              <h4>
                Agar Pesanan Anda Segera Kami Proses
              </h4>
              <div>
                <a href="{{ route('dashboard-pembeli') }}" class="btn btn-dark w-50 mt-4">My Dashboard</a>
              </div>
              <div>
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-2">Go To Shopping</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection