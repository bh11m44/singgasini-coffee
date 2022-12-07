@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2>
                Silahkan mendaftar terlebih dahulu.
              </h2>
              <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input id="name" v-model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input id="email" v-model="email" @change="checkForEmailAvailability()" type="email" class="form-control @error('email') is-invalid @enderror" :class="{ 'is-invalid' : this.email_unavailable }" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Konfirmasi Password</label>
                  <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="col-12">
                  <hr>
                </div>
                <button type="submit" class="btn btn-dark btn-block mt-4" :disabled="this.email_unavailable">Sign Up Now</button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">Back To Sign In</a>
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#jenisMemberTrue').click(function(){
          $('#toko').toggle('slide');
        })
      });

      // $(document).ready(function(){
      //   $('#jenisMemberFalse').click(function(){
      //     $('#toko').show('hidden');
      //   })
      // });

      // function tampil_toko(param)
      // {
      // if(param==1)
      // document.getElementById("toko").style.visibility = 'visible';
      
      // else
      // document.getElementById("toko").style.visibility = 'hidden';
      
      // }
    </script>
    <script>
      Vue.use(Toasted)

      var register = new Vue({
        el: '#register',
        mounted() {
          AOS.init();
          
        },
        methods: {
          checkForEmailAvailability: function() {
            var self = this;
            axios.get('{{ route('api-register-check') }}', {
              params: {
                email: this.email
              }
            })
              .then(function (response) {
                if(response.data == 'Dapat Dipakai') {
                  self.$toasted.show("Email anda bisa dipakai, Silahkan lanjut langkah selanjutnya", {position: "top-center", className: "rounded", duration: 1000});
                  self.email_unavailable = false;
                } else {
                  self.$toasted.error("Maaf, tampaknya email telah terdaftar pada sistem kami", {position: "top-center", className: "rounded", duration: 1000});
                  self.email_unavailable = true;
                }
                // handle success
                console.log(response);
              });
          }
        },
        data() {
          return {
            name: "",
            email: "",
            nama_toko: "",
            email_unavailable: false,
          }
        },
      });
    </script>
@endpush
