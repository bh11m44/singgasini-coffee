@extends('layouts.app')

@section('title')
    Store Product Details
@endsection

@section('content')
    <div class="page-content page-details">
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
                    Products Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image" alt="">
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                  <a href="#" @click="changeActive(index)">
                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{active: index == activePhoto}" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <h1>{{ $product->nama }}</h1>
                <div class="owner">
                  <a href="#">{{ $product->user->nama_toko }}</a>
                </div>
                <div class="price">Rp. {{ number_format($product->harga) }}</div>
                <div class="product-stok">
                  <p>Stok ({{ $product->stok }})</p>
                </div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                  <form action="{{ route('product-details-add-cart', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group justify-content-lg-end my-2">
                        <input type="button" onclick="decrementValue()" value="-" class="btn btn-light btn-sm rounded-pill">
                        <input type="integer" name="qty" value="1" size="2" id="number_qty" class="input-number text-center mx-2" style="border: none">
                        <input type="button" onclick="incrementValue()" value="+" class="btn btn-light btn-sm rounded-pill">
                    </div>
                    <input type="hidden" name="harga" value="{{ $product->harga }}">
                    <div class="col-12">
                      @if($product->stok == 0)
                        @php
                          echo '<script type ="text/JavaScript">';  
                          echo 'alert("Stok Tidak Tersedia")';  
                          echo '</script>';  
                        @endphp
                      @else
                        <button type="submit" class="btn btn-dark px-4 text-white btn-block mb-3">Tambah Keranjang</button>
                      @endif
                    </div>
                  </form>
                @else
                  <a href="{{ route('login') }}" class="btn btn-dark px-4 text-white btn-block mb-3">Sign In</a>
                @endauth
              </div>
            </div>
            <div class="col-8">
                <hr>
              </div>
          </div>
        </section>

        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <h4>Product Description</h4>
                <p>
                  {!! $product->deskripsi !!}
                </p>
              </div>
              
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        function incrementValue() {
            var value = parseInt(document.getElementById("number_qty").value, 10);
            value = isNaN(value) ? 0 : value;
            stock = {{ $product->stok }};
            if (value < stock) {
                value++;
                document.getElementById("number_qty").value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementById("number_qty").value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById("number_qty").value = value;
            }
        }
    </script>
    <script>
      var galery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach($product->galleries as $gallery)
              {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->foto) }}",
              },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          }
        }
      });
    </script>
    {{-- <script type="text/javascript">
      function checkStok()
      {
        alert("Stok Tidak Tersedia").value(1);
      }
    </script> --}}
@endpush