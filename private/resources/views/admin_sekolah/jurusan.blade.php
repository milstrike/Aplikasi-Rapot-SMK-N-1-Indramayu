@extends('template/t_index')        
@section('content')
@extends('template/t_tambahjurusan')
@extends('template/t_tambahkelas')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</a></small></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</a></small></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</a></small></li> 
                            <li><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
                            <li class="active"><a href="manajemenjurusan"><small>Jurusan dan Kelas</a></small></li>
                            <li><a href="manajemenwali"><small>Wali Kelas</a></small></li>
                            <li><a href="manajemensiswa"><small>Siswa</a></small></li>
                            <li><a href="manajemenrapot"><small>Rapot</small></a></li>
                            <li><a href="manajemenakun"><small>Akun</a></small></li>
                            <li><a href="logout"><small>Keluar</a></small></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div style="height: 82%">
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
                    <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span5">
                    <div>
                        <a href="#tambahjurusan" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Jurusan</a>&nbsp;&nbsp;
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>Kode</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Nama Jurusan</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($jurusan->count() > 0)
                                @foreach ($jurusan as $data)
                                <tr>
                                    <td><small>{{ $data -> id_jurusan }}</small></td>
                                    <td><small>{{ $data -> nama }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editjurusan-{{ $data -> id_jurusan }}" data-toggle="modal">Edit Data</a> || <a href="hapusdatajurusan/{{ $data -> id_jurusan }}">Hapus Data</a></small></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" style="text-align: center;"><small>Belum ada data tersimpan</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="span7">
                    <div>
                        <a href="#tambahkelas" role="button" class="btn btn-small btn-primary" data-toggle="modal"><i class="icon-plus-sign icon-white"></i>&nbsp;Tambah Kelas</a>&nbsp;&nbsp;
                            <div style="margin-top: 10px;" class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal;"><small>Kode</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Kelas</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Wali</small></th>
                                    <th style="text-align: center; font-weight: normal;"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($kelas->count() > 0)
                                @foreach ($kelas as $data)
                                <tr>
                                    <td><small>{{ $data -> id_kelas }}</small></td>
                                    <td><small>{{ $data -> nama_kelas }}</small></td>
                                    <td><small>{{ $data -> wali_kelas }}</small></td>
                                    <td style="text-align: center;"><small><a href="#editkelas-{{ $data -> id_kelas }}" data-toggle="modal">Edit Data</a> || <a href="hapusdatakelas/{{ $data -> id_kelas }}">Hapus Data</a> || <a href="#setbidangstudi-{{ $data -> id_kelas }}" data-toggle="modal">Bidang Studi</a></small></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" style="text-align: center;"><small>Belum ada data tersimpan</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                {{ $kelas->links() }}
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>

@if($jurusan->count() > 0)
@foreach ($jurusan as $data)
<div id="editjurusan-{{ $data -> id_jurusan }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Data Jurusan</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdatajurusan">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_edit_jurusan" value="{{ $data -> id_jurusan }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode Jurusan</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Jurusan" name="inputKode" class="span5" value="{{ $data -> id_jurusan }}"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama Jurusan</label></td>
        <td><input type="text" id="inputNama" placeholder="Nama Jurusan" name="inputNama" class="span5" value="{{ $data -> nama }}"></td>
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

@if($kelas->count() > 0)
@foreach ($kelas as $data)
<div id="setbidangstudi-{{ $data -> id_kelas }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 90%; margin-left: -45%; height: 80%;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Set Bidang Studi</h3>
  </div>
  <div class="modal-body" style="height: 100%; width: 100%; overflow: hidden;">
    <small>
    <form method="POST" enctype="multipart/form-data" action="setbidangstudi">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_set_bidang_studi" value="{{ $data -> id_kelas }}">
    <table width="100%" border="0">
      <tr>
        <td colspan="2" >
            <dl class="dl-horizontal">
                <dt>Kode Kelas</dt>
                <dd>{{ $data -> id_kelas }}</dd>
                <dt>Nama Kelas</dt>
                <dd>{{ $data -> nama_kelas }}</dd>
                <dt>Wali Kelas</dt>
                <dd>{{ $data -> wali_kelas }}</dd>
            </dl>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="vertical-align:text-top;"><label>Pilih Bidang Studi yang tersedia:</label>
                 <div class="tabbable" style="width:98%"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs" style="margin-bottom:0;">
                                <li class="active"><a href="#tab1-{{ $data -> id_kelas }}" data-toggle="tab">Semester 1</a></li>
                                <li><a href="#tab2-{{ $data -> id_kelas }}" data-toggle="tab">Semester 2</a></li>
                            </ul>
                            <div class="tab-content" style="height: 300px; overflow-y: scroll; overflow-x: hidden;">
                                <div class="tab-pane active" id="tab1-{{ $data -> id_kelas }}">
                                    <table class="table table-hover table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="text-align: center; font-weight: normal;">Kode</th>
                            <th style="text-align: center; font-weight: normal;">Nama</th>
                            <th style="text-align: center; font-weight: normal;">Deskripsi</th>
                            <th style="text-align: center; font-weight: normal;">Pengampu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bidangstudi->count() > 0)
                            @foreach ($bidangstudi as $databidangstudi)
                        <tr>
                            @if(in_array(preg_replace('/\s+/', '', $databidangstudi -> nama), preg_replace('/\s+/', '', explode("|", $data -> bidang_studi))))
                        <td style="text-align:center; vertical-align:middle; padding-top:3px"></small><input type="checkbox" name="bidangstudi[]" value="{{ $databidangstudi -> nama }}" checked></td>
                            @else
                        <td style="text-align:center; vertical-align:middle; padding-top:3px"></small><input type="checkbox" name="bidangstudi[]" value="{{ $databidangstudi -> nama }}"></td>
                            @endif
                        <td>{{ $databidangstudi -> id_pelajaran }}</td>
                        <td>{{ $databidangstudi -> nama }}</td>
                        <td>{{ $databidangstudi -> deskripsi }}</td>
                        <td>{{ $databidangstudi -> pengampu }}</td>
                        </tr>
                            @endforeach
                    @else
                    <tr><td style="text align:center" colspan="5"><small>Data bidang studi belum tersedia</small></td></tr>
                    @endif
                    </tbody>
            </table>
            &nbsp;
                                </div>

                                
                                <div class="tab-pane" id="tab2-{{ $data -> id_kelas }}">
                                    <table class="table table-hover table-bordered" width="100%" style="margin-top:0;">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="text-align: center; font-weight: normal;">Kode</th>
                            <th style="text-align: center; font-weight: normal;">Nama</th>
                            <th style="text-align: center; font-weight: normal;">Deskripsi</th>
                            <th style="text-align: center; font-weight: normal;">Pengampu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bidangstudi->count() > 0)
                            @foreach ($bidangstudi as $databidangstudi)
                        <tr>
                            @if(in_array(preg_replace('/\s+/', '', $databidangstudi -> nama), preg_replace('/\s+/', '', explode("|", $data -> bidang_studi_2))))
                        <td style="text-align:center; vertical-align:middle; padding-top:3px"></small><input type="checkbox" name="bidangstudi2[]" value="{{ $databidangstudi -> nama }}" checked></td>
                            @else
                        <td style="text-align:center; vertical-align:middle; padding-top:3px"></small><input type="checkbox" name="bidangstudi2[]" value="{{ $databidangstudi -> nama }}"></td>
                            @endif
                        <td>{{ $databidangstudi -> id_pelajaran }}</td>
                        <td>{{ $databidangstudi -> nama }}</td>
                        <td>{{ $databidangstudi -> deskripsi }}</td>
                        <td>{{ $databidangstudi -> pengampu }}</td>
                        </tr>
                            @endforeach
                    @else
                    <tr><td style="text align:center" colspan="5"><small>Data bidang studi belum tersedia</small></td></tr>
                    @endif
                    </tbody>
            </table>
            &nbsp;
                                </div>
                                &nbsp;
                            </div>
                        </div>
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


@if($kelas->count() > 0)
@foreach ($kelas as $data)
<div id="editkelas-{{ $data -> id_kelas }}" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Edit Kelas</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="editdatakelas">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_edit_kelas" value="{{ $data -> id_kelas }}">
    <table width="100%" border="0">
        <tr>
            <td colspan="2">
                Data Sebelumnya:
                <dl class="dl-horizontal">
                <dt>Kode Kelas</dt>
                <dd>{{ $data -> id_kelas }}</dd>
                <dt>Nama Kelas</dt>
                <dd>{{ $data -> nama_kelas }}</dd>
                <dt>Wali Kelas</dt>
                <dd>{{ $data -> wali_kelas }}</dd>
            </dl>
            </td>
        </tr>
      <tr>
        <td style="vertical-align: middle;" width="20%"><label>Kode Kelas</label></td>
        <td width="80%"><input type="text" id="inputKode" placeholder="Kode Kelas" name="inputKode" class="span5" value="{{ $data -> id_kelas }}"></td>
      </tr>
      <tr>
        <td colspan="2">
          <table width="100%">
            <tr>
              <td>
                <label>Kelas</label>
                <select id="inputKelas" name="inputKelas">
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </td>
              <td>
                <label>Jurusan</label>
                <select id="inputJurusan" name="inputJurusan">
                  @foreach($jurusan as $datajurusan)
                  <option value="{{ $datajurusan -> nama }}">{{ $datajurusan -> nama }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Wali kelas</label></td>
        <td>
          <select id="inputWaliKelas" name="inputWaliKelas" class="span4">
            @foreach($guru as $dataguru)
            <option value="{{ $dataguru -> nama }}">{{ $dataguru -> nama }}</option>
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