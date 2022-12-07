@extends('layouts.dashboard-pembeli')

@section('title')
    Store Dashboard Pembeli Transaction
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Transaksi Pembeli
              </h2>
            </div>
          </div>
          <div class="dashboard-content">
            {{-- <div class="row">
              <div class="col-md-6">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Pengeluaran
                    </div>
                    <div class="dashboard-card-subtitle">
                      10.000
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Transaksi
                    </div>
                    <div class="dashboard-card-subtitle">
                      10.000
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
            <div class="row mt-3">
              <div class="col-12 mt-2">
                <h5 class="mb-3">
                  Transaksi
                </h5>
                @foreach ($buytransactions as $transaction)
                <a href="{{ route('dashboard-pembeli-transactions-details', $transaction->id) }}" class="card card-list d-block">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="{{ Storage::url($transaction->product->galleries->first()->foto ?? '') }}" class="w-50">
                      </div>
                      {{-- <div class="col-md-3">
                        {{ $transaction->transaction->total_harga }}
                      </div> --}}
                      <div class="col-md-4">
                        {{ $transaction->product->nama }}
                      </div>
                      <div class="col-md-3">
                        {{ $transaction->product->user->nama_toko }}
                      </div>
                      <div class="col-md-3">
                        {{ $transaction->created_at }}
                      </div>
                      <div class="col-md-1 d-none d-md-block">
                        <img src="/images/dashboard-arrow-right.svg" alt="">
                      </div>
                    </div>
                  </div>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
@endsection