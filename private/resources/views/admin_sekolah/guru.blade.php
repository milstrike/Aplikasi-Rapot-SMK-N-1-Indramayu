@extends('template/t_index')        
@extends('template/t_tambahguru')
@extends('template/t_importguru')
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li class="active"><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li> 
                            <li><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
                            <li><a href="manajemenjurusan"><small>Jurusan dan Kelas</small></a></li>
                            <li><a href="manajemenwali"><small>Wali Kelas</a></small></li>
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
                    @if(Session::has('message'))
                          <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('message') }} </div>
                    @endif
                    @if(Session::has('messageDelete'))
                          <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageDelete') }} </div>
                    @endif
                     @if(Session::has('messageUpdate'))
                          <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageUpdate') }} </div>
                    @endif
                    <div style="height: 82%">
                            <a href="#tambahguru" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Data Guru</a>&nbsp;&nbsp;
                            <a href="#" role="button" class="btn btn-small btn-warning" data-toggle="modal"><i class="icon-circle-arrow-down icon-white"></i>&nbsp;Ekspor Data Guru</a>&nbsp;&nbsp;
                            <a href="#importguru" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-circle-arrow-up icon-white"></i>&nbsp;Impor Data Guru</a>
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>NIP</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Alamat</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>No.Telepon</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Email</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($guru->count() > 0)
                                @foreach ($guru as $data)
                                <tr>
                                    <td><small>{{ $data -> nip }}</small></td>
                                    <td><small>{{ $data -> nama }}</small></td>
                                    <td><small>{{ $data -> alamat }}</small></td>
                                    <td><small>{{ $data -> telepon }}</small></td>
                                    <td><small>{{ $data -> email }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editguru-{{ $data -> id_guru }}" data-toggle="modal">Edit Data</a> || <a href="hapusdataguru/{{ $data -> id_guru }}">Hapus Data</a></small></td>
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
                                <small>{{ $guru->links() }}</small>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

@if($guru->count() > 0)
@foreach ($guru as $data)
<div id="editguru-{{ $data -> id_guru }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Data Guru</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdataguru">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_guru" value="{{ $data -> id_guru }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="20%"><label>NIP</label></td>
        <td width="80%"><input type="text" id="inputNIP" placeholder="NIP" name="inputNIP" class="span5" value="{{ $data -> nip }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><small><input type="text" id="inputNama" placeholder="Nama" name="inputNama" class="span5" value="{{ $data -> nama }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Alamat</label></td>
        <td><small><textarea id="inputAlamat" placeholder="Alamat" name="inputAlamat" class="span5">{{ $data -> alamat }}</textarea></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>No.Telepon</label></td>
        <td><small><input type="text" id="inputTelepon" placeholder="No. Telepon" name="inputTelepon" class="span5" value="{{ $data -> telepon }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>E-mail</label></td>
        <td><small><input type="text" id="inputEmail" placeholder="Email" name="inputEmail" class="span5" value="{{ $data -> email }}"></td>
      </tr>
    </table>
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-small" value="Simpan Data">
    </form>
  </div>
</div>
@endforeach
@else
@endif


        </div>
@endsection