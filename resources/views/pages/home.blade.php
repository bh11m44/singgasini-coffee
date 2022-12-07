@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home" id="page-content-wrapper">
      <section class="store-carousel" data-aos="zoom-in" data-aos-delay="100">       
        <div class="container">       
          <div class="row">
            <div class="col-lg-12">  
              <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#storeCarousel" data-slide-to ="0"></li>
                  <li data-target="#storeCarousel" data-slide-to ="1"></li>
                  <li data-target="#storeCarousel" data-slide-to ="2"></li>
                </ol>
                <div class="carousel-inner" style="border-radius: 20px;">
                  <div class="carousel-item active">
                    <img src="/images/banner-sc.jpg" alt="" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner-sc.jpg" alt="" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner-sc.jpg" alt="" class="d-block w-100">
                  </div>
                  <a class="carousel-control-prev" href="#storeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#storeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-categories mt-5 mb-5">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">
            <div class="card mb-2 shadow-lg p-3 mb-5 bg-white rounded">
                  <div class="card-body">
                    <div class="dashboard-card-title">
                      <h3 style="color: black;">Nikmati Seluruh Produk Kami</h3>
                    </div>
                    <div class="dashboard-card-subtitle">
                      <a href="{{ route('all-products') }}" type="button" class="btn btn-dark d-block mb-2" style="text-align: center;">SHOP NOW</a>
                      <a href="#" type="button" class="btn btn-dark d-block" style="text-align: center;" data-toggle="modal" data-target="#pembelianModal">PANDUAN PEMBELIAN</a>
                    </div>
                  </div>
            </div>
          </div>
          <div class="col-md-4">        
          </div>
        </div>
      </section>

      <section class="store-new-products mb-5">
        <div class="container">
          <div class="row">
            <div class="col-10 col-md-10 col-lg-10" data-aos="fade-up">
              <h2>Gallery</h2>
            </div>
            {{-- <div class="col-6 col-md-2 col-lg-2 mb-3" data-aos="fade-up">
              <a href="{{ route('all-products') }}" type="button" class="btn btn-dark">Semua Produk</a>
            </div> --}}
          </div>
          <div class="row">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
              <img src="/images/ssc1.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">
              <img src="/images/ssc2.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
              <img src="/images/ssc3.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="250">
              <img src="/images/ssc4.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
              <img src="/images/ssc5.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="350">
              <img src="/images/ssc6.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
              <img src="/images/ssc7.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="450">
              <img src="/images/ssc8.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="500">
              <img src="/images/ssc9.jpg" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;">
            </div>
          </div>
        </div>
      </section>

      <section class="store-aboutus mb-5">
        <div class="container">
          <div class="row">
            <div class="col-10 col-md-10 col-lg-10" data-aos="fade-up">
              <h2>About Us</h2>
            </div>
            <img src="/images/ssc10.webp" alt="" class="d-block shadow-lg p-3 mb-5 bg-white rounded" style="width: 360px; height: 360px;" data-aos="zoom-in" data-aos-delay="550">
            &nbsp;&nbsp;
            <div class="col-8 card shadow-lg p-3 mb-5 bg-white rounded" style="height: 360px;" data-aos="zoom-in" data-aos-delay="600">
              <div class="card-body">
                <h1>𝐒𝐢𝐧𝐠𝐠𝐚𝐒𝐢𝐧𝐢 𝐂𝐨𝐟𝐟𝐞𝐞</h1>
                <h5>#karenarasatakbisadipaksa</h5>
                <br><br>
                <h5>Jam Operasional</h5>
                <h6>Sabtu - Kamis &nbsp;
                    10.00 - 22.00
                </h6>
                <h6>
                  Jumat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  14.00 - 22.00
                </h6>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="store-aboutus">
        <div class="container">
          <div class="row">
            <div class="col-md-8" data-aos="fade-up">
              <h2>Address</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.201686867999!2d112.23561431470903!3d-7.552973994552886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784100040914ad%3A0xef60476b55dbc963!2sSinggasini%20Coffee!5e0!3m2!1sen!2sid!4v1656749561870!5m2!1sen!2sid" width="710" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="col-12 shadow-lg p-3 mb-5 bg-white rounded" data-aos="zoom-in" data-aos-delay="650"></iframe>
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
            <p><b>6. Kemudian Transfer Pembayaran Melalui QRIS OVO dibawah ini, Sesuai Dengan TOTAL BAYAR</b></p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <img src="/images/barcode_ovo.jpeg" alt="" style="width: 300px;">
            <p><b>7. Kemudian Kirim Bukti Pembayaran Ke Nomor WHATSAPP : 085852538020 & Nama Pemesan</b></p>
            <p><b>8. Kemudian Anda Bisa Mengambil Produk yang Dibeli Di Outlet Kami</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection