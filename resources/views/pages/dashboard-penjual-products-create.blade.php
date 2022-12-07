@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Product Create
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Tambah Produk Baru</h2>
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
                  <form action="{{ route('dashboard-penjual-product-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Nama Produk</label>
                              <input type="text" class="form-control" name="nama">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Harga</label>
                              <input type="text" class="form-control" placeholder="Harap isi tanpa satuan, Contoh 10000" name="harga">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Stok</label>
                              <input type="number" class="form-control" name="stok">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Deskripsi</label>
                              <textarea name="deskripsi" id="editor"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Foto</label>
                              <input type="file" class="form-control" name="foto" required>
                              <p class="text-mute">
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-dark px-5">
                              Simpan
                            </button>
                          </div>
                        </div>
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor');
    </script>
@endpush