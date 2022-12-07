@extends('layouts.dashboard-pembeli')

@section('title')
    Store Dashboard Pembeli Transaction Detail
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                {{ $transactions->code }}
              </h2>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-4">
                          <img src="{{ Storage::url($transactions->product->galleries->first()->foto ?? '') }}" alt="" class="w-50 mb-3">
                        </div>
                        <div class="col-12 col-md-8">
                          <div class="row">
                            <div class="col-12 col-md-6">
                              <div class="product-title">Nama Toko</div>
                              <div class="product-subtitle">{{ $transactions->product->user->name }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Harga Produk</div>
                              <div class="product-subtitle">Rp. {{ number_format($transactions->product->harga) }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Nama Produk</div>
                              <div class="product-subtitle">{{ $transactions->product->nama }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Kuantitas</div>
                              <div class="product-subtitle">{{ $transactions->kuantitas }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Nomor Handphone</div>
                              <div class="product-subtitle">{{ $transactions->product->user->no_telp }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Total Harga</div>
                              <div class="product-subtitle">Rp. {{ number_format($transactions->harga * $transactions->kuantitas) }}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status Pembelian</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $transactions->status }}" disabled>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
@endsection