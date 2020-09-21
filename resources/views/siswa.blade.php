@extends('templates.dashboard')


@section('content')
    <div class="container">
    <!-- Button trigger modal -->
    @if(session('sukses'))
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    @endif
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button type="button" class="btn btn-primary navbar-brand text-white" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            <form class="form-inline my-2 my-lg-0" >
                <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" name="cari" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 mr-2" type="submit">cari</button>
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" onclick="reset()">reset</button>
            </form>
        </ul>
        </div>
      </nav>
    
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/siswa" method="POST">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                     {{ csrf_field() }}
                    <div class="form-group">
                      <label for="nama_depan">Nama Depan</label>
                      <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}">
                    </div>
                    <div class="form-group">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Genderisasi</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="laki" value="Male"{{ (old('gender') == 'Male') ? 'selected' : '' }}>
                            <label class="form-check-label" for="laki">Laki - Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Female"{{ (old('gender') == 'Female') ? 'selected' : '' }}>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" rows="4" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                    </div>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="container overflow-auto">
    <table class="table ">
        <tr>
            <th>No</th>
            <th colspan="2">Aksi</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Alamat</th>
        </tr>
        <?php $a = 1?>
    @foreach($data_table as $key => $data)
        <tr>
            <td>{{ $data_table->firstItem() + $key}}</td>
            <td>
                <a class="btn btn-primary" href="/siswa/{{ $data->id }}/edit">Edit</a>
            </td>
            <td>
                <a href="/siswa/{{ $data->id }}/hapus"  onclick="return confirm('Hapus ?')" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                  </a>
            </td>
            <td>
                <a href="/siswa/{{ $data->id }}/siswa_profile">{{ $data->nama_depan }}</a>
            </td>
            <td>
                <a href="/siswa/{{ $data->id }}/siswa_profile">{{ $data->nama_belakang }}</a>
            </td>
            <td>{{ $data['email'] }}</td>
            <td>{{ $data['gender'] }}</td>
            <td>{{ $data['alamat'] }}</td>
        </tr>
    @endforeach
    </table>
    </div>
    
     

</div>

@stop
@section('halaman')
    {{$data_table->links()}}   
@stop

@section('js')
<script>
    @if (count($errors) > 0)
        $('#exampleModal').modal('show');
    @endif
    function reset(){
        document.getElementById('search').value = '';
    }
</script>
@stop