@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Penjual
              </h2>
            </div>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-md-6">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Pendapatan
                    </div>
                    <div class="dashboard-card-subtitle">
                      Rp. {{ number_format($pendapatan) }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Transaksi
                    </div>
                    <div class="dashboard-card-subtitle">
                      {{ number_format($transaction_count) }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12 mt-2">
                <h5 class="mb-3">
                  Transaksi
                </h5>
                @foreach ($selltransactions as $transaction)
                <a href="{{ route('dashboard-penjual-transaction-details', $transaction->id) }}" class="card card-list d-block">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="{{ Storage::url($transaction->product->galleries->first()->foto ?? '') }}" class="w-50">
                      </div>
                      <div class="col-md-4">
                        {{ $transaction->product->nama }}
                      </div>
                      <div class="col-md-3">
                        {{ $transaction->transaction->user->name }}
                      </div>
                      <div class="col-md-3">
                        @php
                        echo date('d F Y', strtotime($transaction->created_at));
                        @endphp
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

