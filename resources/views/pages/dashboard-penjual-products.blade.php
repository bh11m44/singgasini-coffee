@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Product
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Produk Penjual
              </h2>
            </div>
          </div>
          <div class="dashboard-content">
            <div class="row">
              <div class="col-12 ml-3">
                <a href="{{ route('dashboard-penjual-product-create') }}" class="btn btn-dark">
                  Tambah Produk Baru
                </a>
              </div>
            </div>
            <div class="row mt-4">
              @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                  <div class="card">
                    <div class="card-body">
                      <a href="{{ route('dashboard-penjual-product-details', $product->id) }}" class="component-products d-block">
                    <div class="products-thumbnail">
                      <div class="products-image" style="background-image: url({{ Storage::url($product->galleries->first()->foto ?? '') }});"></div>
                    </div>
                    <div class="products-text">
                        {{ $product->nama }}
                    </div>
                    <div class="products-price">
                        Rp. {{ number_format($product->harga) }}
                    </div>
                    </a>
                    <form action="{{ route('dashboard-penjual-product-details-delete', $product->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger">
                        Hapus
                      </button>
                    </form>
                    </div>
                  </div>
                </div>  
              @endforeach
          </div>
            <!-- <div class="row mt-4">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="/details.html" class="component-products d-block">
                  <div class="products-thumbnail">
                    <div class="products-image" style="background-image: url('images/products-sayur.jfif');"></div>
                  </div>
                  <div class="products-text">
                      Bayam
                  </div>
                  <div class="products-price">
                      Rp. 7000 / Ikat
                  </div>
                </a>
                <a href="/details.html" class="component-products d-block">
                  <div class="products-thumbnail">
                    <div class="products-image" style="background-image: url('images/products-sayur.jfif');"></div>
                  </div>
                  <div class="products-text">
                      Bayam
                  </div>
                  <div class="products-price">
                      Rp. 7000 / Ikat
                  </div>
                </a>
              </div>
            </div> -->
          </div>
        </div>
@endsection

{{-- @push('addon-style')
    <style>
      .btn-danger {
            margin-top: 0px;
            margin-left: 0px;
      }
    </style>
@endpush --}}