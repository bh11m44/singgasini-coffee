@extends('layouts.dashboard-penjual')

@section('title')
    Store Dashboard Penjual Store
@endsection

@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Dashboard Pengaturan Toko Penjual</h2>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-12">
                  <form action="{{ route('dashboard-penjual-store-redirect', 'dashboard-penjual-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group" v-if="jenis_member">
                              <label for="">Nama Toko</label>
                              <input type="text" class="form-control" name="nama_toko" value="{{ $users->nama_toko }}">
                            </div>
                          </div>
                          {{-- <div class="col-md-6">
                            <div class="form-group" v-if="jenis_member">
                              <label for="">Area Jual</label>
                              <input type="text" class="form-control" name="area_jual" value="{{ $users->area_jual }}">
                            </div>
                          </div>
                          <div class="col-md-7">
                            <div class="form-group">
                              <label for="">Status Toko</label><br>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="status_toko" id="jenisMemberTrue" value="1" {{ $users->status_toko == 1 ? 'checked' : '' }}>
                                <label for="jenisMemberTrue" class="custom-control-label" value="Buka">
                                  Buka
                                </label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="status_toko" id="jenisMemberFalse" value="0" {{ $users->status_toko == 0 || $users->status_toko == NULL ? 'checked' : '' }}>
                                <label for="jenisMemberFalse" class="custom-control-label" value="Tutup">
                                  Tutup
                                </label>
                              </div>
                            </div>
                          </div> --}}
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