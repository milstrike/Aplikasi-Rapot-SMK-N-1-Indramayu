@extends('template/t_index')        
@section('content')
@extends('template/t_tambahbidangstudi')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li class="active"><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li> 
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
                        <a href="#tambahbidangstudi" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Bidang Studi</a>&nbsp;&nbsp;
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>Kode</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama Bidang Studi</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Deskripsi</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Pengampu</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($bidang_studi->count() > 0)
                                @foreach ($bidang_studi as $data)
                                <tr>
                                    <td><small>{{ $data -> id_pelajaran }}</small></td>
                                    <td><small>{{ $data -> nama }}</small></td>
                                    <td><small>{{ $data -> deskripsi }}</small></td>
                                    <td><small>{{ $data -> pengampu }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editbidangstudi-{{ $data -> id_pelajaran }}" data-toggle="modal">Edit Data</a> || <a href="hapusdatabidangstudi/{{ $data -> id_pelajaran }}">Hapus Data</a></small></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align: center;"><small>Belum ada data tersimpan</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                <small>{{ $bidang_studi->links() }}</small>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

@if($bidang_studi->count() > 0)
@foreach ($bidang_studi as $data)
<div id="editbidangstudi-{{ $data -> id_pelajaran }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Data Bidang Studi</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdatabidangstudi">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_edit_bidang_studi" value="{{ $data -> id_pelajaran }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Bidang Studi" name="inputKode" class="span5" value="{{ $data -> id_pelajaran }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><small><input type="text" id="inputNama" placeholder="Nama Bidang Studi" name="inputNama" class="span5" value="{{ $data -> nama }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Deskripsi</label></td>
        <td><small><textarea id="inputDeskripsi" placeholder="Deskripsi Bidang Studi" name="inputDeskripsi" class="span5">{{ $data -> deskripsi }}</textarea></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Guru Pengampu</label></td>
        <td><small>
          <select id="inputGuruPengampu" name="inputGuruPengampu" class="span4">
            @foreach($guru as $dataguru)
            @if($dataguru -> nama == $data -> pengampu)
            <option value="{{ $dataguru -> nama }}" selected>{{ $dataguru -> nama }}</option>
            @else
            <option value="{{ $dataguru -> nama }}">{{ $dataguru -> nama }}</option>
            @endif
            @endforeach
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