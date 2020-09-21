@extends('templates.dashboard')

@section('content')

    <div class="container bootstrap snippet">
    <div class="row">
  		<h1>{{ $data->nama_depan }} {{ $data->nama_belakang }} {{ $data->gambar }}</h1>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="{{ $data->getGambar() }}" class="avatar img-thumbnail" id="gambar_profil" alt="avatar">
      </div><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Keterangan<i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Total Mapel </strong></span>{{ $data->mapel->count() }}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Mata Pelajaran</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Kode Mata Pelajaran</th>
                                <th>Semester</th>
                                <th>Nilai KKM</th>
                                <th>Nilai Siswa</th>
                                <th>Nilai keterangan</th>
                            </tr>
                            @foreach($data->mapel as $mapel)
                            <tr>
                                <td>{{ $mapel->nama_mapel }}</td>
                                <td>{{ $mapel->kode_mapel }}</td>
                                <td>{{ $mapel->semester}}</td>
                                <td>{{ $mapel->kkm }}</td>
                                <td>{{ $mapel->pivot->nilai }}</td>
                                @if($mapel->pivot->nilai >= $mapel->kkm)
                                    <td>Lulus</td>
                                @elseif($mapel->pivot->nilai <= $mapel->kkm)
                                    <td>Tidak Lulus</td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                      </div>
                  </div>
                
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Aksi :</div>
                            <a class="dropdown-item" href="/siswa/{{ $data->id }}/edit">Edit data</a>
                          </div>
                        </div>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <table class="table">
                          <tr>
                            <th>id</th>
                            <td>{{ $data->id }}</td>
                          </tr>
                          <tr>
                            <th>Nama Depan</th>
                            <td>{{ $data->nama_depan }}</td>
                          </tr>
                          <tr>
                            <th>Nama Belakang</th>
                            <td>{{ $data->nama_belakang }}</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>{{ $data->email }}</td>
                          </tr>
                          <tr>
                            <th>Gender</th>
                            <td>{{ $data->gender }}</td>
                          </tr>
                          <tr>
                            <th>Alamat</th>
                            <td>{{ $data->alamat }}</td>
                          </tr>
                        
                        </table>
                      </div>
                  </div>   
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
              </div>
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

@stop