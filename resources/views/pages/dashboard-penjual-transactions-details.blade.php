@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Transaction Detail
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
              <div class="row mb-4">
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
                              <div class="product-title">Nama Pembeli</div>
                              <div class="product-subtitle">{{ $transactions->transaction->user->name }}</div>
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
                              <div class="product-title">Tanggal Transaksi</div>
                              <div class="product-subtitle">{{ $transactions->created_at }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Total Bayar</div>
                              <div class="product-subtitle">Rp. {{ number_format($transactions->harga * $transactions->kuantitas) }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="product-title">Nomor Handphone</div>
                              <div class="product-subtitle">{{ $transactions->transaction->user->no_telp }}</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('dashboard-penjual-transaction-details-update', $transactions->id) }}" method="POST">
                              @csrf
                              {{-- <div class="col-md-4"> --}}
                                  <label>Status Pembelian</label>
                                        <select name="status" required class="form-control">
                                          <option value="{{ $transactions->status }}" selected>{{ $transactions->status }}</option>
                                          <option value="Produk Telah Diterima Pembeli">Produk Telah Diterima Pembeli</option>
                                          <option value="Produk Dibatalkan Oleh Penjual">Produk Dibatalkan Oleh Penjual</option>
                                        </select>
                        </div>
                        <div class="col-md-4">
                                  <button type="submit" class="btn btn-dark px-5" style="margin-left: -15px; margin-top: 30px;">
                                  Simpan
                                  </button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

