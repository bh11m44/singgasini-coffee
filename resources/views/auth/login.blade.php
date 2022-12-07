@extends('layouts.auth')

@section('content')

<div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img src="/images/ssc11.webp" alt="" class="w-75 mb-4 mb-lg-none" style="border-radius: 40px;">
            </div>
            <div class="col-lg-5">
              <h2>
                SinggaSini Coffee
              </h2>
              <form method="POST" action="{{ route('login') }}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input id="email" type="email" class="form-control w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>Email Salah</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input id="password" type="password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Password Salah</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark btn-block w-75 mt-4">Sign In To My Account</button>
                <a href="{{ route('register') }}" class="btn btn-signup btn-block w-75 mt-2">Sign Up</a>
              </form>
            </div>
          </div>
        </div>
      </div>
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

<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
