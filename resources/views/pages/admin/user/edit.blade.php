@extends('layouts.dashboard-admin')

@section('title')
    Store Dashboard Admin Pengguna
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">
                Dashboard Admin Edit Pengguna
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
                            <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                 <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input type="text" name="name" id="" class="form-control" required value="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email Pengguna</label>
                                            <input type="email" name="email" id="" class="form-control" required value="{{ $item->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password Pengguna</label>
                                            <input type="password" name="password" id="" class="form-control">
                                            <small>Kosongkan Jika Tidak Ingin Mengganti Password</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Foto Pengguna</label>
                                            <input type="file" name="foto" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jenis Pengguna</label>
                                            <select name="jenis_pengguna" required class="form-control">
                                                <option value="{{ $item->jenis_pengguna }}" selected>Tidak Diganti</option>
                                                <option value="ADMIN">ADMIN</option>
                                                <option value="PENJUAL">PENJUAL</option>
                                                <option value="PEMBELI">PEMBELI</option>
                                            </select>
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