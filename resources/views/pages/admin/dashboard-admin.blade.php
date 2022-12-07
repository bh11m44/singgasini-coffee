@extends('layouts.dashboard-admin')

@section('title')
    Store Dashboard Admin
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Admin
              </h2>
            </div>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Customer
                    </div>
                    <div class="dashboard-card-subtitle">
                      {{ $Customer }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Total Transaksi
                    </div>
                    <div class="dashboard-card-subtitle">
                      Rp. {{ number_format($Pendapatan) }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card mb-2">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      Transaksi Dilakukan
                    </div>
                    <div class="dashboard-card-subtitle">
                      {{ $Transaksi }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection