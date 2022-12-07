@extends('layouts.app')

@section('title')
    Store All Products
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="store-categories mt-4">
        <div class="container">
          {{-- <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Kategori</h5>
            </div>
          </div> --}}
          {{-- <div class="row">
            @php
              $incrementCategory = 0
            @endphp
          @forelse ($categories as $category)
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
              <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                <div class="categories-image">
                  <img src="{{ Storage::url($category->foto) }}" alt="" class="w-100">
                </div> 
                <p class="categories-text">
                  {{ $category->nama }}
                </p>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
              Tidak Ada Kategori Ditemukan
            </div>
          @endforelse
          </div> --}}
        </div>
      </section>

      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
            </div>
            <div class="col" data-aos="fade-up">
              <form method="GET" action="{{ route('all-products') }}">
                <input class="search" type="text" name="cari" placeholder="Cari..." required>	
                <button type="submit" class="button">Cari</button>
              </form>
            </div>
          </div>
          <div class="row">
            @php
              $incrementProduct = 0
            @endphp
            @forelse ($products as $product)
              <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                <a href="{{ route('product-details', $product->slug) }}" class="component-products d-block">
                  <div class="products-thumbnail">
                    <div class="products-image" 
                          style="@if($product->galleries->count())
                                    background-image: url('{{ Storage::url($product->galleries->first()->foto) }}')
                                  @else
                                    background-color: #eee
                                  @endif
                          "
                    ></div>
                  </div>
                  <div class="products-text">
                      {{ $product->nama }}
                  </div>
                  <div class="products-price">
                      Rp. {{ number_format($product->harga) }}
                  </div>
                </a>
              </div>
            @empty
              <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
              Tidak Ada Produk Ditemukan
            </div>
            @endforelse
          </div>
          <div class="row">
            <div class="col-12 mt-4">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pembelianModal" tabindex="-1" role="dialog" aria-labelledby="pembelianModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="pembelianModalLabel" style="color: red;">PANDUAN PEMBELIAN PRODUK</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><b>1. Register / Login Dahulu Bila Anda Ingin Melakukan Pembelian Produk</b></p>
            <p><b>2. Masuk Ke Halaman SHOP</b></p>
            <p><b>3. Kemudian Pilih Produk yang Ingin Anda Beli</b></p>
            <p><b>4. Kemudian Masukkan Kuantitas Yang Ingin Dibeli, Lalu Click TAMBAH KERANJANG</b></p>
            <p><b>5. Kemudian Click CHECKOUT NOW</b></p>
            <p><b>6. Kemudian Transfer Pembayaran Melalui OVO / GOPAY, Sesuai Dengan TOTAL BAYAR</b></p>
            <p><b>7. Kemudian Kirim Bukti Pembayaran Ke Nomor WHATSAPP : ...</b></p>
            <p><b>8. Kemudian Anda Bisa Mengambil Produk yang Dibeli Di Outlet Kami</b></p>

            <h5 style="color: red;">OVO : </h5>
            <h5 style="color: red;">GOPAY : </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection