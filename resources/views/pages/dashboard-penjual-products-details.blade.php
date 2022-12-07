@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Product Detail
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Sirup</h2>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  @if($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <form action="{{ route('dashboard-penjual-product-details-update', $products->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" value="{{ $products->nama }}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Harga</label>
                              <input type="text" class="form-control" placeholder="Harap isi tanpa satuan, Contoh 10000" name="harga" value="{{ $products->harga }}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Stok</label>
                              <input type="number" class="form-control" name="stok" value="{{ $products->stok }}">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="deskripsi" id="editor">{!! $products->deskripsi !!}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-dark px-5 btn-block">
                              Simpan
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        @foreach($products->galleries as $gallery)
                        <div class="col-md-4">
                          <div class="gallery-container">
                            <img src="{{ Storage::url($gallery->foto) ?? '' }}" alt="" class="w-100">
                            <a href="{{ route('dashboard-penjual-product-details-update-gallery-delete', $gallery->id) }}" class="delete-gallery">
                              <img src="/images/icon-delete.svg" alt="">
                            </a>
                          </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                          <form action="{{ route('dashboard-penjual-product-details-update-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="products_id" value="{{ $products->id }}">
                            <input type="file" name="foto" id="file" style="display: none;" onchange="form.submit()">
                            <button type="button" class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()">
                              Tambah Foto
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace('editor');
    </script>
@endpush