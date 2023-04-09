@extends('layouts.app')
@section('title', 'Pelatih')

@section('content')
@if(Session::has('alert'))
  @if(Session::get('sweetalert')=='success')
    <div class="swalDefaultSuccess">
    </div>
  @elseif(Session::get('sweetalert')=='error')
    <div class="swalDefaultError">
    </div>
    @elseif(Session::get('sweetalert')=='danger')
    <div class="swalDefaultDanger">
    </div>
  @endif
@endif
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pelatih</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Barang</a></li>
                <li class="breadcrumb-item"><a href="#">Data Pelatih</a></li>
                <li class="breadcrumb-item active">Tambah Data Pelatih</li>
            </ol>
            </div>
        </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title text-center">
                                <h4 class="text-light">Tambah Pelatih</h4>
                            </div>
                        </div>
                        @if(Request::is('Pelatih/Add'))
                            <form action="{{route('store.pelatih')}}" method="POST" enctype="multipart/form-data" class="add-professors">
                        @else
                            <form action="{{route('update.pelatih', $pelatih->id)}}" method="POST" enctype="multipart/form-data" class="add-professors">
                        @endif
                        @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="nama_pelatih">Nama Pelatih</label>
                                            <input name="nama_pelatih" type="text" class="form-control @error('nama_pelatih') is-invalid @enderror" placeholder="Nama Pelatih" value="{{ isset($pelatih) ? $pelatih->nama_pelatih : old('nama_pelatih') }}" autocomplete="off">
                                            @error('nama_pelatih')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="jenis">Jenis Pelatih</label>
                                            <select name="jenis_id" id="jenis_id" class="form-control @error('nama_pelatih') is-invalid @enderror">
                                                <option value="" class="text-center">Pilih Jenis Pelatih</option>
                                                @foreach($jenis as $dt)
                                                    <option value="{{$dt->id}}" {{isset($pelatih) ? ($pelatih->jenis_id == $dt->id) ? 'selected' : '' : ''}}>{{$dt->jenis}}</option>
                                                @endforeach
                                            </select>
                                            @error('jenis_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Email Pelatih</label>
                                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Pelatih" value="{{ isset($user) ? $user->email : old('email') }}" autocomplete="off">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="tlp_pelatih">Telepon Pelatih</label>
                                            <input name="tlp_pelatih" type="text" class="form-control @error('tlp_pelatih') is-invalid @enderror" placeholder="Telepon Pelatih" value="{{ isset($pelatih) ? $pelatih->tlp_pelatih : old('tlp_pelatih') }}" autocomplete="off">
                                            @error('tlp_pelatih')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="almt_pelatih">Alamat Pelatih</label>
                                            <textarea name="almt_pelatih" id="almt_pelatih" cols="30" rows="5" class="form-control  @error('almt_pelatih') is-invalid @enderror">{{ isset($pelatih) ? $pelatih->almt_pelatih : old('almt_pelatih') }}</textarea>
                                            @error('almt_pelatih')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop