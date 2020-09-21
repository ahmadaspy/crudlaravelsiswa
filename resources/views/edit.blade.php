@extends('templates.dashboard')
@section('content')
<div class="container">
    @if(session('sukses'))
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    @endif
<form action="/siswa/{{ $data->id }}/update" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
   <div class="form-group">
     <label for="nama_depan">Nama Depan</label>
     <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $data->nama_depan }}">
   </div>
   <div class="form-group">
     <label for="nama_belakang">Nama Belakang</label>
     <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $data->nama_belakang }}">
   </div>
   <div class="form-group">
       <label for="email">email</label>
       <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
   </div>
   <div class="form-group">
       <label>Gender</label>
       <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="laki" value="Male" @if($data->gender == 'Male'||'male') checked @endif>
           <label class="form-check-label" for="laki">Laki - Laki</label>
       </div>
       <div class="form-check">
           <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Female" @if($data->gender == 'Female'||'female') checked @endif>
           <label class="form-check-label" for="perempuan">Perempuan</label>
       </div>
   </div>
   <div class="form-group">
       <label for="alamat">Alamat</label>
       <textarea class="form-control" rows="4" id="alamat" name="alamat">{{ $data->alamat }}</textarea>
   </div>
    <div class="form-group">
        <label for="gambar">Upload Gambar</label>
        <input type="file"  name="gambar" id="gambar">
        <br>
        <span>upload dengan nama file sesuai nama</span>
    </div>    
    <a href="/siswa" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop