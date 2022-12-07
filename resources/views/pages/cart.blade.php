@extends('layouts.app')

@section('title')
    Store Cart
@endsection

@section('content')
    <div class="page-content page-cart">
      <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Gambar</td>
                    <td>Nama Produk &amp; Penjual</td>
                    <td>Harga</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                  @php $totalharga = 0; @endphp
                  @foreach($carts as $cart)
                      <tr class="product-data">
                      @if($cart->product->galleries)
                        <td style="width: 20%;">
                          <img src="{{ Storage::url($cart->product->galleries->first()->foto) }}" 
                          alt="" class="cart-image w-100">
                        </td>
                      @endif
                      <td style="width: 35%;">
                        <div class="product-title">{{ $cart->product->nama }}</div>
                        <div class="product-subtitle">{{ $cart->product->user->nama_toko }}</div>
                      </td>
                      <td style="width: 35%;">
                        <div class="product-title">Rp. {{ number_format($cart->total_harga) }}</div>
                      </td>
                      <td style="width: 20%;">
                        <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-remove-cart">
                                Hapus
                              </button>
                          </form>
                      </td>
                    </tr>
                    @php $totalharga += $cart->total_harga @endphp
                  @endforeach
                  {{-- @foreach($carts as $keranjang)
                    @php $harga_qty += $cart->harga * $cart->kuantitas @endphp
                  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr>
            </div>
            <div class="col-12">
              <h2 class="mb-4">Informasi Anda</h2>
            </div>
          </div>
          
          <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="total_harga" value="{{ $totalharga }}">
            {{-- <input type="hidden" name="harga_qty" value="{{ $harga_qty }}"> --}}
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" disabled>
                </div>
              </div>
              <div class="col-md-6 telepon">
                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ Auth::user()->no_telp }}" disabled>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr>
              </div>
              <div class="col-12">
                <h2 class="mb-2">Informasi Pembayaran</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
              <div class="col-7">
                <div class="product-title text-success">Rp. {{ number_format($totalharga ?? 0) }}</div>
                {{-- <div class="product-title text-success">Rp. {{ number_format($harga_qty ?? 0) }}</div> --}}
                <div class="product-subtitle">Total</div>
              </div>
              <div class="col-5">
                <button type="submit" class="btn btn-dark mt-4 px-4 btn-block">
                  Checkout
                </button>
              </div>
          </div>
          </form>
        </div>
      </section>
    </div>

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

@push('addon-script')
     <script>
      $(document).ready(function (){
        $('.increment-btn').click(function (e) {
          e.preventDefault();

          // var inc_value = $('.qty-input').val();
          var inc_value = $(this).closest('.product-data').find('.qty-input').val();
          var value = parseInt(inc_value, 10);
          value = isNaN(value) ? 0 : value;
          if(value < 10){
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product-data').find('.qty-input').val(value);
          }
        });
      });

       $(document).ready(function (){
        $('.decrement-btn').click(function (e) {
          e.preventDefault();

          // var inc_value = $('.qty-input').val();
          var inc_value = $(this).closest('.product-data').find('.qty-input').val();
          var value = parseInt(inc_value, 10);
          value = isNaN(value) ? 0 : value;
          if(value > 1){
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product-data').find('.qty-input').val(value);
          }
        });
      });
    </script>
@endpush