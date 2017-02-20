@extends('template/t_index')
@extends('template/t_tambahsiswa')
@extends('template/t_importsiswa')
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
                            <li><a href="manajemenwali"><small>Wali Kelas</a></small></li>
                            <li class="active"><a href="manajemensiswa"><small>Siswa</small></a></li>
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
                        <a href="#tambahsiswa" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Data Siswa</a>&nbsp;&nbsp;
                            <a href="#" role="button" class="btn btn-small btn-warning" data-toggle="modal"><i class="icon-circle-arrow-down icon-white"></i>&nbsp;Ekspor Data Siswa</a>&nbsp;&nbsp;
                            <a href="#importsiswa" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-circle-arrow-up icon-white"></i>&nbsp;Impor Data Siswa</a>
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>NIS</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama Siswa</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Kelas</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Angkatan</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($siswa->count() > 0)
                                @foreach ($siswa as $data)
                                <tr>
                                    <td><small>{{ $data -> nis }}</small></td>
                                    <td><small>{{ $data -> nama }}</small></td>
                                    <td><small>{{ $data -> kelas }}</small></td>
                                    <td style="text-align: center;"><small>{{ $data -> angkatan }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editsiswa-{{ $data -> id_siswa }}" data-toggle="modal">Edit Data</a> || <a href="hapusdatasiswa/{{ $data -> id_siswa }}">Hapus Data</a></small></td>
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
                                <small>{{ $siswa->links() }}</small>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            @if($siswa->count() > 0)
                @foreach ($siswa as $data)
                    <div id="editsiswa-{{ $data -> id_siswa }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Data Siswa</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdatasiswa">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="idSiswa" value="{{ $data -> id_siswa }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-top;" width="20%">NIS</td>
        <td width="80%"><input type="text" id="inputNIS" placeholder="NIS" name="inputNIS" class="span5" value="{{ $data -> nis }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Nama Siswa</td>
        <td><input type="text" id="inputNama" placeholder="Nama" name="inputNama" class="span5" value="{{ $data -> nama }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Kelas</td>
        <td>
          <select id="inputKelas" name="inputKelas">
            @foreach($kelas as $datakelas)
            @if(preg_replace('/\s+/', '', $data -> kelas) == preg_replace('/\s+/', '', $datakelas -> nama_kelas))
            <option value="{{ $datakelas -> nama_kelas }}" selected>{{ $datakelas -> nama_kelas }}</option>
            @else
            <option value="{{ $datakelas -> nama_kelas }}">{{ $datakelas -> nama_kelas }}</option>
            @endif
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Angkatan</td>
        <td>
          <select id="inputAngkatan" name="inputAngkatan">
            @for ($tahun = 2000; $tahun < 2030; $tahun++)
              @if($tahun == $data -> angkatan)
              <option value="{{ $tahun }}" selected>{{ $tahun }}</option>
              @else
              <option value="{{ $tahun }}">{{ $tahun }}</option>
              @endif
            @endfor
          </select>
        </td>
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