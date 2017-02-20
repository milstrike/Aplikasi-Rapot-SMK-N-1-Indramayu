@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="../../../walikelas"><small>Dashboard</small></a></li>
                            <li><a href="../../../rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li><a href="../../../rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li class="active"><a href="../../../rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li style="padding-left: 40px;"><small>Penilaian Siswa</small></li>
                            <li><a href="../../../akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="../../../logout"><small>Keluar</small></a></li>
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
                    @if(Session::has('messageUpdate'))
                          <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageUpdate') }} </div>
                    @endif
                    <div class="paneleverything">
                        <strong>INFORMASI KELAS</strong>
                        @if($detailrapot->count()>0)
                            <table border="0" width="100%">
                            <tr>
                                <td width="10%">Kelas</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detailrapot->first()->kelas }} angkatan {{ $detailrapot->first()->angkatan }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Tahun Ajaran</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $masterrapot->first()->tahun_ajaran }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Jumlah Siswa</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detailrapot->count() }} siswa</td>
                            <tr>    
                            </table>
                        @else
                            <table border="0" width="100%">
                            <tr>
                                <td><strong>Data rapot belum siap, hubungi administrator sekolah.</strong></td>
                            <tr>
                        </table>
                        @endif
                    </div>
                    <div class="paneleverything" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="5%" rowspan="2"><small>NIS</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="16%" rowspan="2"><small>Nama</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="8%" rowspan="2"><small>Angkatan</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="20%" rowspan="2"><small>Ekstrakulikuler</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" colspan="4"><small>Set Nilai</small></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="6%"><small>Semester 1</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="16%"><small>Deskripsi</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="6%"><small>Semester 2</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="16%"><small>Deskripsi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="POST" enctype="multipart/form-data" action="../../../updatenilaiekskul">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idrapot" value="{{ $idrapotset }}">
                                    <input type="hidden" name="kelas" value="{{ $kelasset }}">
                                @if($detailrapot->count() >0)
                                    @foreach($detailrapot as $detail)
                                    <input type="hidden" name="idnilai[]" value="{{ $detail->id }}">
                                        <tr>
                                            <td>{{ $detail -> nis }}</td>
                                            <td>{{ $detail -> nama_siswa}}</td>
                                            <td style="text-align: center;">{{ $detail -> angkatan}}</td>
                                            <td style="text-align: center;">
                                                <select name="ekskuloption[]" class="span10">
                                                    @if($masterekskul->count() > 0)
                                                        @foreach($masterekskul as $ekskul)
                                                            @if($ekskul -> nama == $detail -> nama_ekskul)
                                                                <option value="{{ $ekskul -> nama }}" class="span3" selected>{{ $ekskul -> nama }}</option>
                                                            @else
                                                                <option value="{{ $ekskul -> nama }}" class="span3">{{ $ekskul -> nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="-" class="span3">Data Ekstrakulikuler belum ada</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td style="text-align: center;"><input type="text" name="nilai1[]" class="span10" value="{{$detail->nilai_1}}" style="text-align:right;"></td>
                                            <td style="text-align: center;"><textarea name="keterangan1[]" class="span12">{{$detail->deskripsi_1}}</textarea></td>
                                            <td style="text-align: center;"><input type="text" name="nilai2[]" class="span10" value="{{$detail->nilai_2}}" style="text-align:right;"></td>
                                            <td style="text-align: center;"><textarea name="keterangan2[]" class="span12">{{$detail->deskripsi_2}}</textarea></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                    <td colspan="5" style="text-align: center;"><small>Belum Ada data</small></td>
                                    </tr>
                                @endif
                                @if($detailrapot->count()>0)
                                    <input type="submit" class="btn btn-primary btn-small pull-left" style="margin-bottom: 10px;" value="Simpan Nilai">
                                @else
                                    <input type="submit" class="btn btn-small pull-left" style="margin-bottom: 10px;" value="Simpan Nilai" disabled>
                                @endif
                            </form>
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                <small>{{ $detailrapot->links() }}</small>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection