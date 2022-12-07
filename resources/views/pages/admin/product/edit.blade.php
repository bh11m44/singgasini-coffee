@extends('layouts.dashboard-admin')

@section('title')
    Store Dashboard Admin Produk
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Admin Edit Produk
              </h2>
            </div>
          </div>
          <div class="dashboard-content">
              <div class="row">
                <div class="col-md-12">
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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="text" name="nama" id="" class="form-control" value="{{ $item->nama }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pemilik Produk</label>
                                            <select name="users_id" class="form-control">
                                                <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kategori Produk</label>
                                            <select name="categories_id" class="form-control">
                                                <option value="{{ $item->categories_id }}" selected>{{ $item->category->nama }}</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga Produk</label>
                                            <input type="number" name="harga" id="" class="form-control" value="{{ $item->harga }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stok Produk</label>
                                            <input type="number" name="stok" id="" class="form-control" value="{{ $item->stok }}" required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Satuan Produk</label>
                                            <select name="satuan" required class="form-control">
                                                <option value="{{ $item->satuan }}" selected>{{ $item->satuan }}</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Gram">Gram</option>
                                                <option value="Ikat">Ikat</option>
                                                <option value="Pcs">Pcs</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Produk</label>
                                            <textarea name="deskripsi" id="editor">{!! $item->deskripsi !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        CKEDITOR.replace( 'editor' );
    </script>
@endpush