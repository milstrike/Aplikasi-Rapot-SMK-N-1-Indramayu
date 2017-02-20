@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li> 
                            <li><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
                            <li><a href="manajemenjurusan"><small>Jurusan dan Kelas</small></a></li>
                            <li class="active"><a href="manajemenwali"><small>Wali Kelas</a></small></li>
                            <li><a href="manajemensiswa"><small>Siswa</small></a></li>
                            <li><a href="manajemenrapot"><small>Rapot</small></a></li>
                            <li><a href="manajemenakun"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 4000);
                    </script>
                    @if(Session::has('messageDelete'))
                          <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageDelete') }} </div>
                    @endif
                     @if(Session::has('messageUpdate'))
                          <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageUpdate') }} </div>
                    @endif
                    <div style="height: 82%">
                            <div class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Kelas</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($datawali->count() > 0)
                                @foreach ($datawali as $data)
                                <tr>
                                    <td><small>{{ $data -> wali_kelas }}</small></td>
                                    <td><small>{{ $data -> nama_kelas }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editwali-{{ preg_replace('/\s+/', '', $data -> wali_kelas)  }}" data-toggle="modal">Edit Akun Wali</a> | <a href="tampilinfoakun/{{ preg_replace('/\s+/', '', $data -> wali_kelas)  }}">Info Akun Wali</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" style="text-align: center;"><small>Belum ada data tersimpan</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                <small>{{ $datawali->links() }}</small>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

@if(Session::has('message'))
    <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('message') }} </div>
@endif

@if($datawali->count() > 0)
@foreach ($datawali as $data)
<div id="editwali-{{ preg_replace('/\s+/', '', $data -> wali_kelas) }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Akun Wali Kelas</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdatawali">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_wali" value="{{ $data -> wali_kelas }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="20%"><label>Username</label></td>
        <td width="80%"><input type="text" id="inputUsername" placeholder="username" name="inputUsername" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Password</label></td>
        <td><small><input type="password" id="inputPassword" placeholder="password" name="inputPassword" class="span5"></td>
      </tr>
    </table>
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-small" value="Simpan Data Akun">
    </form>
  </div>
</div>
@endforeach
@else
@endif


        </div>
@endsection