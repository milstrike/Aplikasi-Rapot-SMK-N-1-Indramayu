@extends('template/t_index')        
@section('content')
@extends('template/t_tambahekstrakulikuler')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li>
                            <li class="active"><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
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
                        <a href="#tambahekstrakulikuler" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Ekstrakulikuler</a>&nbsp;&nbsp;
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>Kode</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama Ekstrakulikuler</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Waktu Pelaksanaan</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Deskripsi</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Pembimbing</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($ekstrakulikuler->count() > 0)
                                @foreach ($ekstrakulikuler as $data)
                                <tr>
                                    <td><small>{{ $data -> id_ekskul }}</small></td>
                                    <td><small>{{ $data -> nama }}</small></td>
                                    <td><small>{{ $data -> waktu }}</small></td>
                                    <td><small>{{ $data -> deskripsi }}</small></td>
                                    <td><small>{{ $data -> pembimbing }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editekstrakulikuler-{{ $data -> id_ekskul }}" data-toggle="modal">Edit Data</a> || <a href="hapusdataekstrakulikuler/{{ $data -> id_ekskul }}">Hapus Data</a></small></td>
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
                                <small>{{ $ekstrakulikuler->links() }}</small>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            @if($ekstrakulikuler->count() > 0)
            @foreach ($ekstrakulikuler as $data)
<div id="editekstrakulikuler-{{ $data -> id_ekskul }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Data Ekstrakulikuler</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdataekstrakulikuler">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_edit_ekstrakulikuler" value="{{ $data -> id_ekskul }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Ekstrakulikuler" name="inputKode" class="span5" value="{{ $data -> id_ekskul }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><small><input type="text" id="inputNama" placeholder="Nama Ekstrakulikuler" name="inputNama" class="span5" value="{{ $data -> nama }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama Pembimbing</label></td>
        <td><small><input type="text" id="inputPembimbing" placeholder="Nama Pembimbing" name="inputPembimbing" class="span5" value="{{ $data -> pembimbing }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Waktu Pelaksanaan</label></td>
        <td><small><input type="text" id="inputWaktu" placeholder="Contoh: Jumat Sore Jam 15.00" name="inputWaktu" class="span5" value="{{ $data -> waktu }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Deskripsi</label></td>
        <td><small><textarea id="inputDeskripsi" placeholder="Deskripsi Ekstrakulikuler" name="inputDeskripsi" class="span5">{{ $data -> deskripsi }}</textarea></td>
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