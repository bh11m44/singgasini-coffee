@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Account
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Dashboard Pengaturan Akun Penjual</h2>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <form action="{{ route('dashboard-penjual-account-redirect', 'dashboard-penjual-account') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="name" value="{{ $users->name }}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="address">Alamat</label>
                              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $users->alamat }}">
                            </div>
                          </div>
                          <div class="col-md-6 telepon">
                            <div class="form-group">
                              <label for="telepon">Nomor Telepon</label>
                              <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $users->no_telp }}">
                            </div>
                          </div>
                          <div class="col-md-6 telepon">
                            <div class="form-group">
                              <label for="foto">Upload Foto</label>
                              <input type="file" class="form-control" name="foto" required>
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
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection